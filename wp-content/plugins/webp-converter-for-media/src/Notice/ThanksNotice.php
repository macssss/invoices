<?php

namespace WebpConverter\Notice;

/**
 * Supports notice displayed as thank you for using plugin.
 */
class ThanksNotice extends NoticeAbstract implements NoticeInterface {

	const NOTICE_OPTION     = 'webpc_notice_thanks';
	const NOTICE_OLD_OPTION = 'webpc_notice_hidden';
	const NOTICE_VIEW_PATH  = 'components/notices/thanks.php';

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
		return (string) strtotime( '+ 1 week' );
	}

	/**
	 * {@inheritdoc}
	 */
	public function is_available(): bool {
		if ( basename( $_SERVER['PHP_SELF'] ) !== 'index.php' ) { // phpcs:ignore
			return false;
		}

		$value = get_option( self::NOTICE_OPTION, 0 );
		return ( $value < time() );
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
			'ajax_url' => admin_url( 'admin-ajax.php' ),
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_ajax_action_to_disable(): string {
		return 'webpc_notice';
	}

	/**
	 * {@inheritdoc}
	 */
	public static function disable_notice() {
		$is_permanent = ( isset( $_POST['is_permanently'] ) && $_POST['is_permanently'] ); // phpcs:ignore
		$expires_date = strtotime( ( $is_permanent ) ? '+6 months' : '+ 1 month' );

		update_option( self::NOTICE_OPTION, $expires_date );
	}
}
