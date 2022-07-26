/**
 * External dependencies
 */
import { isEmpty, reduce, zipObject, pickBy } from 'lodash';
import Ajv from 'ajv';

/**
 * WordPress dependencies
 */
import { useDispatch, useSelect } from '@wordpress/data';
import { __, sprintf } from '@wordpress/i18n';
import { useMemo } from '@wordpress/element';

/**
 * Internal dependencies
 */
import { ONBOARD_STORE_NAME } from '@ithemes/security.pages.settings';
import { MODULES_STORE_NAME } from '@ithemes/security-data';
import { STORE_NAME as SEARCH_STORE_NAME } from '@ithemes/security-search';
import { useSingletonEffect } from '@ithemes/security-hocs';

function getAjv() {
	if ( ! getAjv.instance ) {
		getAjv.instance = new Ajv( { schemaId: 'id' } );
		getAjv.instance.addMetaSchema(
			require( 'ajv/lib/refs/json-schema-draft-04.json' )
		);
	}

	return getAjv.instance;
}

export function useSettingsDefinitions( filters = {} ) {
	const ajv = getAjv();
	const { modules, activeModules, allSettings } = useSelect( ( select ) => ( {
		modules: select( MODULES_STORE_NAME ).getEditedModules(),
		activeModules: select( MODULES_STORE_NAME ).getActiveModules(),
		allSettings: select(
			MODULES_STORE_NAME
		).__unstableGetAllEditedSettings(),
	} ) );
	const filter = ( module ) =>
		! filters.module || filters.module === module.id;

	const getPassReqGroups = () =>
		Object.fromEntries(
			modules
				.filter(
					( module ) => ! isEmpty( module.password_requirements )
				)
				.flatMap( ( module ) =>
					Object.entries( module.password_requirements )
						.filter( ( [ , definition ] ) =>
							definition.hasOwnProperty( 'user-group' )
						)
						.map( ( [ requirement, definition ] ) => [
							`requirement_settings.${ requirement }.group`,
							{
								title: definition.title || module.title,
								description:
									definition.description ||
									module.description,
							},
						] )
				)
		);

	return useMemo(
		() =>
			modules.reduce( ( definitions, module ) => {
				if ( module.status.selected !== 'active' ) {
					return definitions;
				}

				if ( ! filter( module ) ) {
					return definitions;
				}

				if (
					module.id !== 'password-requirements' &&
					isEmpty( module.user_groups )
				) {
					return definitions;
				}

				const settings = pickBy(
					module.id === 'password-requirements'
						? getPassReqGroups()
						: module.user_groups,
					( definition ) => {
						if ( ! definition.conditional ) {
							return true;
						}

						if ( definition.conditional[ 'active-modules' ] ) {
							for ( const activeModule of definition.conditional[
								'active-modules'
							] ) {
								if (
									! activeModules.includes( activeModule )
								) {
									return false;
								}
							}
						}

						if ( definition.conditional.settings ) {
							const validate = ajv.compile(
								definition.conditional.settings
							);

							if ( ! validate( allSettings[ module.id ] ) ) {
								return false;
							}
						}

						return true;
					}
				);

				if ( isEmpty( settings ) ) {
					return definitions;
				}

				definitions.push( {
					id: module.id,
					title: module.title,
					description: module.description,
					settings,
				} );

				return definitions;
			}, [] ),
		[ modules ]
	);
}

export function useCompletionSteps() {
	const { registerCompletionStep } = useDispatch( ONBOARD_STORE_NAME );
	const { saveGroups, saveGroupSettingsAsBatch } = useDispatch(
		'ithemes-security/user-groups-editor'
	);

	useSingletonEffect( useCompletionSteps, () => {
		registerCompletionStep( {
			id: 'savingUserGroups',
			label: __( 'Create User Groups', 'it-l10n-ithemes-security-pro' ),
			priority: 15,
			callback() {
				return saveGroups();
			},
			render: function SavingUserGroups() {
				const groups = useSelect( ( select ) => {
					const store = select(
						'ithemes-security/user-groups-editor'
					);

					return ( store.getMatchableNavIds() || [] ).map( ( id ) =>
						store.getEditedMatchableLabel( id )
					);
				}, [] );

				if ( ! groups.length ) {
					return (
						<p>
							{ __(
								'No User Groups have been created.',
								'it-l10n-ithemes-security-pro'
							) }
						</p>
					);
				}

				return (
					<>
						<p>
							{ __(
								'The following User Groups will be created:',
								'it-l10n-ithemes-security-pro'
							) }
						</p>
						<ul>
							{ groups.map( ( group, i ) => (
								<li key={ i }>{ group }</li>
							) ) }
						</ul>
					</>
				);
			},
		} );
		registerCompletionStep( {
			id: 'savingUserGroupsSetting',
			label: __( 'Setup User Group Settings', 'it-l10n-ithemes-security-pro' ),
			priority: 20,
			callback() {
				return saveGroupSettingsAsBatch();
			},
			render: function SavingUserGroupsSettings() {
				const definitions = useSettingsDefinitions();
				const { ids: groupIds, labels, settings } = useSelect(
					( select ) => {
						const store = select(
							'ithemes-security/user-groups-editor'
						);
						const ids = store.getMatchableNavIds() || [];

						return {
							ids,
							labels: zipObject(
								ids,
								ids.map( ( id ) =>
									store.getEditedMatchableLabel( id )
								)
							),
							settings: zipObject(
								ids,
								ids.map( ( id ) =>
									store.getEditedGroupSettings( id )
								)
							),
						};
					},
					[]
				);

				if ( ! groupIds.length ) {
					return (
						<p>
							{ __(
								'No User Groups have been created.',
								'it-l10n-ithemes-security-pro'
							) }
						</p>
					);
				}

				return (
					<>
						<p>
							{ __(
								'The following features will be enabled for each User Group:',
								'it-l10n-ithemes-security-pro'
							) }
						</p>
						<ul className="itsec-secure-site-user-groups-settings-panel">
							{ groupIds.map( ( id ) => {
								const settingLabels = definitions.flatMap(
									( module ) => {
										if ( ! settings[ id ]?.[ module.id ] ) {
											return [];
										}

										return reduce(
											module.settings,
											( acc, definition, setting ) => {
												if (
													settings[ id ][ module.id ][
														setting
													] === true
												) {
													acc.push(
														definition.title
													);
												}

												return acc;
											},
											[]
										);
									}
								);

								if ( ! settingLabels.length ) {
									return (
										<li key={ id }>
											{ sprintf(
												/* translators: 1. The User Group label. */
												__( '%s: None', 'it-l10n-ithemes-security-pro' ),
												labels[ id ]
											) }
										</li>
									);
								}

								return (
									<li key={ id }>
										<strong>{ labels[ id ] }</strong>
										<ul>
											{ settingLabels.map(
												( label, i ) => (
													<li key={ i }>{ label }</li>
												)
											) }
										</ul>
									</li>
								);
							} ) }
						</ul>
					</>
				);
			},
		} );
	} );
}

export function useSearchProviders() {
	const { registerProvider } = useDispatch( SEARCH_STORE_NAME );

	useSingletonEffect( useSearchProviders, () => {
		registerProvider(
			'user-group-settings',
			__( 'User Group Settings', 'it-l10n-ithemes-security-pro' ),
			25,
			( { registry, evaluate, results } ) => {
				const modules = registry
					.select( MODULES_STORE_NAME )
					.getEditedModules();

				return modules.reduce( ( total, module ) => {
					if (
						module.status.selected !== 'active' ||
						! module.settings?.interactive?.length
					) {
						return total;
					}

					return reduce(
						module.user_groups,
						( count, config, group ) => {
							if (
								! evaluate.stringMatch( config.title ) &&
								! evaluate.stringMatch( config.description ) &&
								! evaluate.keywordMatch( config.keywords )
							) {
								return count;
							}

							results.groups[ module.id ] ??= {
								title: module.title,
								items: [],
							};

							results.groups[ module.id ].items.push( {
								title: config.title,
								description: config.description,
								route: `/settings/user-groups?module=${ module.id }#${ module.id }/${ group }`,
							} );

							return count++;
						},
						total
					);
				}, 0 );
			}
		);

		registerProvider(
			'user-groups',
			__( 'User Groups', 'it-l10n-ithemes-security-pro' ),
			50,
			( { registry, evaluate, results } ) => {
				const groups =
					registry
						.select( 'ithemes-security/user-groups-editor' )
						.getAvailableGroups() || [];

				return groups.reduce( ( count, group ) => {
					if ( ! evaluate.stringMatch( group.label ) ) {
						return count;
					}

					results.items.push( {
						title: group.label,
						description: group.description,
						route: `/settings/user-groups/${ group.id }`,
					} );

					return count++;
				}, 0 );
			}
		);
	} );
}
