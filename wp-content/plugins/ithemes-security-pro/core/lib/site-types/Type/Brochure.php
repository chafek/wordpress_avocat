<?php

namespace iThemesSecurity\Lib\Site_Types\Type;

use iThemesSecurity\Lib\Site_Types\Question\Client_Question_Pack;
use iThemesSecurity\Lib\Site_Types\Question\Login_Security_Question_Pack;
use iThemesSecurity\Lib\Site_Types\Site_Type;

final class Brochure implements Site_Type {
	public function get_slug(): string {
		return self::BROCHURE;
	}

	public function get_title(): string {
		return __( 'Brochure', 'it-l10n-ithemes-security-pro' );
	}

	public function get_description(): string {
		return __( 'A simple website to promote your business.', 'it-l10n-ithemes-security-pro' );
	}

	public function get_icon(): string {
		return 'media-document';
	}

	public function get_questions(): array {
		return array_merge(
			( new Client_Question_Pack() )->get_questions(),
			( new Login_Security_Question_Pack( $this ) )->get_questions()
		);
	}
}