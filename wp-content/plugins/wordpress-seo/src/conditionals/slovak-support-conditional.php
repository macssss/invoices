<?php

namespace Yoast\WP\SEO\Conditionals;

/**
 * Checks if the YOAST_SEO_SLOVAK_SUPPORT constant is set.
 */
class Slovak_Support_Conditional extends Feature_Flag_Conditional {

	/**
	 * Returns the name of the feature flag.
	 * 'YOAST_SEO_' is automatically prepended to it and it will be uppercased.
	 *
	 * @return string the name of the feature flag.
	 */
	public function get_feature_flag() {
		return 'SLOVAK_SUPPORT';
	}
}
