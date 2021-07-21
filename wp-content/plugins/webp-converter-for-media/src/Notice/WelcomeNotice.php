<?php

namespace WebpConverter\Notice;

use WebpConverter\Settings\Page\PageIntegration;

/**
 * Supports notice displayed after plugin installation.
 */
class WelcomeNotice extends NoticeAbstract implements NoticeInterface {

	const NOTICE_OPTION    = 'webpc_is_new_installation';
	const NOTICE_VIEW_PATH = 'components/notices/welcome.php';

	/**
	 * {@inheritdoc}
	 */
	public function get_option_name(): string {
		return self::NOTICE_OPTION;
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_default_value(): string {
		return '1';
	}

	/**
	 * {@inheritdoc}
	 */
	public function is_available(): bool {
		return ( get_option( self::NOTICE_OPTION, 0 ) === $this->get_default_value() );
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_output_path(): string {
		return self::NOTICE_VIEW_PATH;
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_vars_for_view(): array {
		return [
			'settings_url' => PageIntegration::get_settings_page_url(),
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public static function disable_notice() {
		update_option( self::NOTICE_OPTION, '0' );
	}
}
