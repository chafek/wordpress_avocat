<?php

namespace iThemesSecurity\Ban_Users;

use iThemesSecurity\Actor\Multi_Actor_Factory;
use iThemesSecurity\Ban_Hosts\Filters;
use Pimple\Container;
use Pimple\Exception\FrozenServiceException;

return static function ( Container $c ) {
	$c['module.ban-users.files'] = [
		'rest.php' => REST::class,
	];

	try {
		$c->extend( 'ban-hosts.repositories', static function ( $repositories ) {
			if ( \ITSEC_Modules::get_setting( 'ban-users', 'enable_ban_lists' ) ) {
				$repositories[] = Database_Repository::class;
			}

			return $repositories;
		} );
	} catch ( FrozenServiceException $e ) {

	}

	$c[ Database_Repository::class ] = static function ( Container $c ) {
		return new Database_Repository(
			$c[ Multi_Actor_Factory::class ],
			$c[ \wpdb::class ]
		);
	};

	$c[ REST::class ] = static function ( Container $c ) {
		return new REST( $c[ Database_Repository::class ] );
	};

	\ITSEC_Lib::extend_if_able( $c, 'dashboard.cards', function ( $cards ) use ( $c ) {
		$cards[] = new \ITSEC_Dashboard_Card_Pie_Chart( 'banned-users', __( 'Bans Overview', 'it-l10n-ithemes-security-pro' ), [
			[
				'events' => 'blacklist-brute_force',
				'label'  => __( 'Login Attempts', 'it-l10n-ithemes-security-pro' ),
			],
			[
				'events' => 'blacklist-brute_force_admin_user',
				'label'  => __( 'Login Using "admin"', 'it-l10n-ithemes-security-pro' ),
			],
			[
				'events' => 'blacklist-recaptcha',
				'label'  => __( 'Recaptcha', 'it-l10n-ithemes-security-pro' ),
			],
		], [
			'circle_label'    => _x( 'Banned', 'Total Banned IPs', 'it-l10n-ithemes-security-pro' ),
			'circle_callback' => function () use ( $c ) {
				return $c[ Database_Repository::class ]->count_bans( new Filters() );
			},
		] );

		return $cards;
	} );

};
