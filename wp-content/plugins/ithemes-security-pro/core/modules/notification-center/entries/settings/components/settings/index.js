/**
 * WordPress dependencies
 */
import { TextControl, Button } from '@wordpress/components';
import { useSelect, useDispatch } from '@wordpress/data';
import { __ } from '@wordpress/i18n';

/**
 * Internal dependencies
 */
import { HelpList } from '@ithemes/security-components';
import {
	HelpFill,
	PageHeader,
	PrimaryForm,
	PrimaryFormSection,
} from '@ithemes/security.pages.settings';
import { MODULES_STORE_NAME } from '@ithemes/security-data';
import { UserRoleList } from '..';

export default function Settings( {
	usersAndRoles,
	onSubmit,
	saveLabel = __( 'Save All', 'it-l10n-ithemes-security-pro' ),
	allowUndo = true,
	allowCleanSave = false,
	apiError,
} ) {
	const { isDirty, isSaving, fromEmail, defaultRecipients } = useSelect(
		( select ) => ( {
			isDirty: select( MODULES_STORE_NAME ).areSettingsDirty(
				'notification-center'
			),
			isSaving: select( MODULES_STORE_NAME ).isSavingSettings(
				'notification-center'
			),
			fromEmail:
				select( MODULES_STORE_NAME ).getEditedSetting(
					'notification-center',
					'from_email'
				) || '',
			defaultRecipients:
				select( MODULES_STORE_NAME ).getEditedSetting(
					'notification-center',
					'default_recipients'
				) || {},
		} )
	);
	const { editSetting, resetSettingEdits } = useDispatch(
		MODULES_STORE_NAME
	);

	return (
		<>
			<PageHeader
				title={ __( 'Notification Center', 'it-l10n-ithemes-security-pro' ) }
				description={ __(
					'Manage and configure email notifications sent by iThemes Security related to various settings modules.',
					'it-l10n-ithemes-security-pro'
				) }
			/>
			<PrimaryForm
				saveLabel={ saveLabel }
				saveDisabled={ ! isDirty && ! allowCleanSave }
				isSaving={ isSaving }
				onSubmit={ onSubmit }
				apiError={ apiError }
				buttons={
					allowUndo && [
						<Button
							key="undo"
							onClick={ () =>
								resetSettingEdits( 'notification-center' )
							}
							disabled={ ! isDirty }
						>
							{ __( 'Undo Changes', 'it-l10n-ithemes-security-pro' ) }
						</Button>,
					]
				}
			>
				<TextControl
					type="email"
					value={ fromEmail }
					onChange={ ( email ) =>
						editSetting(
							'notification-center',
							'from_email',
							email
						)
					}
					label={ __( 'From Email', 'it-l10n-ithemes-security-pro' ) }
					help={ __(
						'iThemes Security will send notifications from this email address. Leave blank to use the WordPress default.',
						'it-l10n-ithemes-security-pro'
					) }
				/>
				<PrimaryFormSection heading={ __( 'Default Recipients' ) }>
					<UserRoleList
						help={ __(
							'Set the default recipients for any admin-facing notifications.',
							'it-l10n-ithemes-security-pro'
						) }
						value={ defaultRecipients.user_list || [] }
						onChange={ ( recipients ) =>
							editSetting(
								'notification-center',
								'default_recipients',
								{ ...defaultRecipients, user_list: recipients }
							)
						}
						usersAndRoles={ usersAndRoles }
					/>
				</PrimaryFormSection>
			</PrimaryForm>
			<HelpFill>
				<PageHeader title={ __( 'Notifications', 'it-l10n-ithemes-security-pro' ) } />
				<HelpList topic="notification-center" />
			</HelpFill>
		</>
	);
}
