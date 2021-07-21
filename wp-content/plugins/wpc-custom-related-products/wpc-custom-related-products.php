<?php
/*
Plugin Name: WPC Custom Related Products for WooCommerce
Plugin URI: https://wpclever.net/
Description: WPC Custom Related Products allows you to choose custom related products for each product.
Version: 1.2.3
Author: WPClever
Author URI: https://wpclever.net
Text Domain: wpc-custom-related-products
Domain Path: /languages/
Requires at least: 4.0
Tested up to: 5.8
WC requires at least: 3.0
WC tested up to: 5.5.1
*/

defined( 'ABSPATH' ) || exit;

! defined( 'WOOCR_VERSION' ) && define( 'WOOCR_VERSION', '1.2.3' );
! defined( 'WOOCR_URI' ) && define( 'WOOCR_URI', plugin_dir_url( __FILE__ ) );
! defined( 'WOOCR_PATH' ) && define( 'WOOCR_PATH', plugin_dir_path( __FILE__ ) );
! defined( 'WOOCR_SUPPORT' ) && define( 'WOOCR_SUPPORT', 'https://wpclever.net/support?utm_source=support&utm_medium=woocr&utm_campaign=wporg' );
! defined( 'WOOCR_REVIEWS' ) && define( 'WOOCR_REVIEWS', 'https://wordpress.org/support/plugin/wpc-custom-related-products/reviews/?filter=5' );
! defined( 'WOOCR_CHANGELOG' ) && define( 'WOOCR_CHANGELOG', 'https://wordpress.org/plugins/wpc-custom-related-products/#developers' );
! defined( 'WOOCR_DISCUSSION' ) && define( 'WOOCR_DISCUSSION', 'https://wordpress.org/support/plugin/wpc-custom-related-products' );
! defined( 'WPC_URI' ) && define( 'WPC_URI', WOOCR_URI );

include 'includes/wpc-dashboard.php';
include 'includes/wpc-menu.php';
include 'includes/wpc-kit.php';
include 'includes/wpc-notice.php';

if ( ! function_exists( 'woocr_init' ) ) {
	add_action( 'plugins_loaded', 'woocr_init', 11 );

	function woocr_init() {
		// load text-domain
		load_plugin_textdomain( 'wpc-custom-related-products', false, basename( __DIR__ ) . '/languages/' );

		if ( ! function_exists( 'WC' ) || ! version_compare( WC()->version, '3.0', '>=' ) ) {
			add_action( 'admin_notices', 'woocr_notice_wc' );

			return;
		}

		if ( ! class_exists( 'WPCleverWoocr' ) && class_exists( 'WC_Product' ) ) {
			class WPCleverWoocr {
				function __construct() {
					// Menu
					add_action( 'admin_menu', array( $this, 'woocr_admin_menu' ) );

					// Enqueue backend scripts
					add_action( 'admin_enqueue_scripts', array( $this, 'woocr_admin_enqueue_scripts' ) );

					// Add settings link
					add_filter( 'plugin_action_links', array( $this, 'woocr_action_links' ), 10, 2 );
					add_filter( 'plugin_row_meta', array( $this, 'woocr_row_meta' ), 10, 2 );

					// Backend AJAX search
					add_action( 'wp_ajax_woocr_get_search_results', array( $this, 'woocr_get_search_results' ) );

					// Product data tabs
					add_filter( 'woocommerce_product_data_tabs', array( $this, 'woocr_product_data_tabs' ), 10, 1 );
					add_action( 'woocommerce_product_data_panels', array( $this, 'woocr_product_data_panels' ) );
					add_action( 'woocommerce_process_product_meta', array( $this, 'woocr_save_option_field' ) );

					// Related products
					add_filter( 'woocommerce_related_products', array( $this, 'woocr_related_products' ), 10, 2 );

					// Search filters
					if ( get_option( '_woocr_search_sku', 'no' ) === 'yes' ) {
						add_filter( 'pre_get_posts', array( $this, 'woocr_search_sku' ), 99 );
					}
					if ( get_option( '_woocr_search_exact', 'no' ) === 'yes' ) {
						add_action( 'pre_get_posts', array( $this, 'woocr_search_exact' ), 99 );
					}
					if ( get_option( '_woocr_search_sentence', 'no' ) === 'yes' ) {
						add_action( 'pre_get_posts', array( $this, 'woocr_search_sentence' ), 99 );
					}
				}

				function woocr_admin_menu() {
					add_submenu_page( 'wpclever', esc_html__( 'WPC Custom Related Products', 'wpc-custom-related-products' ), esc_html__( 'Related Products', 'wpc-custom-related-products' ), 'manage_options', 'wpclever-woocr', array(
						&$this,
						'woocr_admin_menu_content'
					) );
				}

				function woocr_admin_menu_content() {
					$active_tab = isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : 'how';
					?>
                    <div class="wpclever_settings_page wrap">
                        <h1 class="wpclever_settings_page_title"><?php echo esc_html__( 'WPC Custom Related Products', 'wpc-custom-related-products' ) . ' ' . WOOCR_VERSION; ?></h1>
                        <div class="wpclever_settings_page_desc about-text">
                            <p>
								<?php printf( esc_html__( 'Thank you for using our plugin! If you are satisfied, please reward it a full five-star %s rating.', 'wpc-custom-related-products' ), '<span style="color:#ffb900">&#9733;&#9733;&#9733;&#9733;&#9733;</span>' ); ?>
                                <br/>
                                <a href="<?php echo esc_url( WOOCR_REVIEWS ); ?>"
                                   target="_blank"><?php esc_html_e( 'Reviews', 'wpc-custom-related-products' ); ?></a>
                                | <a
                                        href="<?php echo esc_url( WOOCR_CHANGELOG ); ?>"
                                        target="_blank"><?php esc_html_e( 'Changelog', 'wpc-custom-related-products' ); ?></a>
                                | <a href="<?php echo esc_url( WOOCR_DISCUSSION ); ?>"
                                     target="_blank"><?php esc_html_e( 'Discussion', 'wpc-custom-related-products' ); ?></a>
                            </p>
                        </div>
                        <div class="wpclever_settings_page_nav">
                            <h2 class="nav-tab-wrapper">
                                <a href="<?php echo admin_url( 'admin.php?page=wpclever-woocr&tab=how' ); ?>"
                                   class="<?php echo $active_tab === 'how' ? 'nav-tab nav-tab-active' : 'nav-tab'; ?>">
									<?php esc_html_e( 'How to use?', 'wpc-custom-related-products' ); ?>
                                </a>
                                <a href="<?php echo admin_url( 'admin.php?page=wpclever-woocr&tab=settings' ); ?>"
                                   class="<?php echo $active_tab === 'settings' ? 'nav-tab nav-tab-active' : 'nav-tab'; ?>">
									<?php esc_html_e( 'Settings', 'wpc-custom-related-products' ); ?>
                                </a>
                                <a href="<?php echo esc_url( WOOCR_SUPPORT ); ?>" class="nav-tab" target="_blank">
									<?php esc_html_e( 'Support', 'wpc-custom-related-products' ); ?>
                                </a>
                                <a href="<?php echo esc_url( admin_url( 'admin.php?page=wpclever-kit' ) ); ?>"
                                   class="nav-tab">
									<?php esc_html_e( 'Essential Kit', 'wpc-custom-related-products' ); ?>
                                </a>
                            </h2>
                        </div>
                        <div class="wpclever_settings_page_content">
							<?php if ( $active_tab === 'how' ) { ?>
                                <div class="wpclever_settings_page_content_text">
                                    <p>
										<?php esc_html_e( 'When creating/editing the product, please choose "Related Product" tab then you can search and add custom related products.', 'wpc-custom-related-products' ); ?>
                                    </p>
                                    <p>
                                        <img src="<?php echo WOOCR_URI; ?>assets/images/how-01.jpg"/>
                                    </p>
                                </div>
								<?php
							} elseif ( $active_tab === 'settings' ) {
								$woocr_search_limit    = get_option( '_woocr_search_limit', '5' );
								$woocr_search_sku      = get_option( '_woocr_search_sku', 'no' );
								$woocr_search_exact    = get_option( '_woocr_search_exact', 'no' );
								$woocr_search_sentence = get_option( '_woocr_search_sentence', 'no' );
								?>
                                <form method="post" action="options.php">
									<?php wp_nonce_field( 'update-options' ) ?>
                                    <table class="form-table">
                                        <tr class="heading">
                                            <th colspan="2">
												<?php esc_html_e( 'Search', 'wpc-custom-related-products' ); ?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th><?php esc_html_e( 'Search limit', 'wpc-custom-related-products' ); ?></th>
                                            <td>
                                                <input name="_woocr_search_limit" type="number" min="1" max="500"
                                                       value="<?php echo esc_attr( $woocr_search_limit ); ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><?php esc_html_e( 'Search by SKU', 'wpc-custom-related-products' ); ?></th>
                                            <td>
                                                <select name="_woocr_search_sku">
                                                    <option
                                                            value="yes" <?php echo esc_attr( $woocr_search_sku === 'yes' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'Yes', 'wpc-custom-related-products' ); ?>
                                                    </option>
                                                    <option
                                                            value="no" <?php echo esc_attr( $woocr_search_sku === 'no' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'No', 'wpc-custom-related-products' ); ?>
                                                    </option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><?php esc_html_e( 'Search exact', 'wpc-custom-related-products' ); ?></th>
                                            <td>
                                                <select name="_woocr_search_exact">
                                                    <option
                                                            value="yes" <?php echo esc_attr( $woocr_search_exact === 'yes' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'Yes', 'wpc-custom-related-products' ); ?>
                                                    </option>
                                                    <option
                                                            value="no" <?php echo esc_attr( $woocr_search_exact === 'no' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'No', 'wpc-custom-related-products' ); ?>
                                                    </option>
                                                </select> <span
                                                        class="description"><?php esc_html_e( 'Match whole product title or content?', 'wpc-custom-related-products' ); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><?php esc_html_e( 'Search sentence', 'wpc-custom-related-products' ); ?></th>
                                            <td>
                                                <select name="_woocr_search_sentence">
                                                    <option
                                                            value="yes" <?php echo esc_attr( $woocr_search_sentence === 'yes' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'Yes', 'wpc-custom-related-products' ); ?>
                                                    </option>
                                                    <option
                                                            value="no" <?php echo esc_attr( $woocr_search_sentence === 'no' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'No', 'wpc-custom-related-products' ); ?>
                                                    </option>
                                                </select> <span
                                                        class="description"><?php esc_html_e( 'Do a phrase search?', 'wpc-custom-related-products' ); ?></span>
                                            </td>
                                        </tr>
                                        <tr class="submit">
                                            <th colspan="2">
                                                <input type="submit" name="submit" class="button button-primary"
                                                       value="<?php esc_attr_e( 'Update Options', 'wpc-custom-related-products' ); ?>"/>
                                                <input type="hidden" name="action" value="update"/>
                                                <input type="hidden" name="page_options"
                                                       value="_woocr_search_limit,_woocr_search_sku,_woocr_search_exact,_woocr_search_sentence"/>
                                            </th>
                                        </tr>
                                    </table>
                                </form>
							<?php } ?>
                        </div>
                    </div>
					<?php
				}

				function woocr_admin_enqueue_scripts() {
					wp_enqueue_style( 'woocr-backend', WOOCR_URI . 'assets/css/backend.css' );
					wp_enqueue_script( 'dragarrange', WOOCR_URI . 'assets/js/drag-arrange.js', array( 'jquery' ), WOOCR_VERSION, true );
					wp_enqueue_script( 'woocr-backend', WOOCR_URI . 'assets/js/backend.js', array( 'jquery' ), WOOCR_VERSION, true );
				}

				function woocr_action_links( $links, $file ) {
					static $plugin;

					if ( ! isset( $plugin ) ) {
						$plugin = plugin_basename( __FILE__ );
					}

					if ( $plugin === $file ) {
						$how      = '<a href="' . admin_url( 'admin.php?page=wpclever-woocr&tab=how' ) . '">' . esc_html__( 'How to use?', 'wpc-custom-related-products' ) . '</a>';
						$settings = '<a href="' . admin_url( 'admin.php?page=wpclever-woocr&tab=settings' ) . '">' . esc_html__( 'Settings', 'wpc-custom-related-products' ) . '</a>';
						array_unshift( $links, $how, $settings );
					}

					return (array) $links;
				}

				function woocr_row_meta( $links, $file ) {
					static $plugin;

					if ( ! isset( $plugin ) ) {
						$plugin = plugin_basename( __FILE__ );
					}

					if ( $plugin === $file ) {
						$row_meta = array(
							'support' => '<a href="' . esc_url( WOOCR_SUPPORT ) . '" target="_blank">' . esc_html__( 'Support', 'wpc-custom-related-products' ) . '</a>',
						);

						return array_merge( $links, $row_meta );
					}

					return (array) $links;
				}

				function woocr_get_search_results() {
					$keyword          = sanitize_text_field( $_POST['keyword'] );
					$ids              = $_POST['ids'];
					$woocr_query_args = array(
						'is_woocr'       => true,
						'post_type'      => 'product',
						'post_status'    => array( 'publish', 'private' ),
						's'              => $keyword,
						'posts_per_page' => get_option( '_woocr_search_limit', '5' ),
						'post__not_in'   => $ids
					);
					$woocr_query      = new WP_Query( $woocr_query_args );

					if ( $woocr_query->have_posts() ) {
						echo '<ul>';

						while ( $woocr_query->have_posts() ) {
							$woocr_query->the_post();
							$product = wc_get_product( get_the_ID() );

							if ( ! $product ) {
								continue;
							}

							echo '<li ' . ( ! $product->is_in_stock() ? 'class="out-of-stock"' : '' ) . '><span class="move"></span><span class="name"><input type="hidden" value="' . $product->get_id() . '"/>' . $product->get_name() . '</span> (' . $product->get_price_html() . ') <span class="type">' . $product->get_type() . ' #' . $product->get_id() . '</span> <span class="remove">+</span></li>';
						}

						echo '</ul>';
						wp_reset_postdata();
					} else {
						echo '<ul><span>' . sprintf( esc_html__( 'No results found for "%s"', 'wpc-custom-related-products' ), $keyword ) . '</span></ul>';
					}

					die();
				}

				function woocr_product_data_tabs( $tabs ) {
					$tabs['woocr'] = array(
						'label'  => esc_html__( 'Related Products', 'wpc-custom-related-products' ),
						'target' => 'woocr_settings'
					);

					return $tabs;
				}

				function woocr_product_data_panels() {
					global $post;
					$post_id = $post->ID;
					?>
                    <div id='woocr_settings' class='panel woocommerce_options_panel woocr_table'>
                        <table>
                            <tr>
                                <th><?php esc_html_e( 'Search', 'wpc-custom-related-products' ); ?> (<a
                                            href="<?php echo admin_url( 'admin.php?page=wpclever-woocr&tab=settings#search' ); ?>"
                                            target="_blank"><?php esc_html_e( 'settings', 'wpc-custom-related-products' ); ?></a>)
                                </th>
                                <td>
                                    <div class="w100">
								<span class="loading"
                                      id="woocr_loading"><?php esc_html_e( 'searching...', 'wpc-custom-related-products' ); ?></span>
                                        <input type="search" id="woocr_keyword"
                                               placeholder="<?php esc_attr_e( 'Type any keyword to search', 'wpc-custom-related-products' ); ?>"/>
                                        <div id="woocr_results" class="woocr_results"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="woocr_tr_space">
                                <th><?php esc_html_e( 'Selected', 'wpc-custom-related-products' ); ?></th>
                                <td>
                                    <div class="w100">
                                        <div id="woocr_selected" class="woocr_selected">
                                            <ul>
												<?php if ( ( $woocr_items = get_post_meta( $post_id, 'woocr_ids', true ) ) && is_array( $woocr_items ) && count( $woocr_items ) > 0 ) {
													foreach ( $woocr_items as $woocr_item ) {
														$woocr_product = wc_get_product( $woocr_item );

														if ( ! $woocr_product ) {
															continue;
														}

														echo '<li ' . ( ! $woocr_product->is_in_stock() ? 'class="out-of-stock"' : '' ) . '><span class="move"></span><span class="name"><input type="hidden" name="woocr_ids[]" value="' . $woocr_product->get_id() . '"/>' . $woocr_product->get_name() . '</span> (' . $woocr_product->get_price_html() . ')  <span class="type">' . $woocr_product->get_type() . ' #' . $woocr_product->get_id() . '</span>  <span class="remove">×</span></li>';
													}
												} ?>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
					<?php
				}

				function woocr_save_option_field( $post_id ) {
					if ( isset( $_POST['woocr_ids'] ) ) {
						update_post_meta( $post_id, 'woocr_ids', $_POST['woocr_ids'] );
					} else {
						delete_post_meta( $post_id, 'woocr_ids' );
					}
				}

				function woocr_related_products( $related_posts, $product_id ) {
					return get_post_meta( $product_id, 'woocr_ids', true ) ?: $related_posts;
				}

				function woocr_search_sku( $query ) {
					if ( $query->is_search && isset( $query->query['is_woocr'] ) ) {
						global $wpdb;
						$sku = $query->query['s'];
						$ids = $wpdb->get_col( $wpdb->prepare( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key='_sku' AND meta_value = %s;", $sku ) );

						if ( ! $ids ) {
							return;
						}

						unset( $query->query['s'], $query->query_vars['s'] );
						$query->query['post__in'] = array();

						foreach ( $ids as $id ) {
							$post = get_post( $id );

							if ( $post->post_type === 'product_variation' ) {
								$query->query['post__in'][]      = $post->post_parent;
								$query->query_vars['post__in'][] = $post->post_parent;
							} else {
								$query->query_vars['post__in'][] = $post->ID;
							}
						}
					}
				}

				function woocr_search_exact( $query ) {
					if ( $query->is_search && isset( $query->query['is_woocr'] ) ) {
						$query->set( 'exact', true );
					}
				}

				function woocr_search_sentence( $query ) {
					if ( $query->is_search && isset( $query->query['is_woocr'] ) ) {
						$query->set( 'sentence', true );
					}
				}
			}

			new WPCleverWoocr();
		}
	}
} else {
	add_action( 'admin_notices', 'woocr_notice_premium' );
}

if ( ! function_exists( 'woocr_notice_wc' ) ) {
	function woocr_notice_wc() {
		?>
        <div class="error">
            <p><strong>WPC Custom Related Products</strong> requires WooCommerce version 3.0 or greater.</p>
        </div>
		<?php
	}
}

if ( ! function_exists( 'woocr_notice_premium' ) ) {
	function woocr_notice_premium() {
		?>
        <div class="error">
            <p>Seems you're using both free and premium version of <strong>WPC Custom Related Products</strong>. Please
                deactivate the free version when using the premium version.</p>
        </div>
		<?php
	}
}