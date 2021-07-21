<?php
/**
* @package   Warp Theme Framework
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

class Warp_Breadcrumbs extends \WP_Widget
{
    public function __construct()
    {
        $widget_ops = array('description' => 'Display your sites breadcrumb navigation');
        parent::__construct(false, 'Warp - Breadcrumbs', $widget_ops);
    }

    public function widget($args, $instance)
    {
        global $wp_query;

        extract($args);
        
        $title = $instance['title'];
        $home_title = trim($instance['home_title']);

        if (empty($home_title)) {
            $home_title = 'Home';
        }

        echo $before_widget;

        if ($title) {
            echo $before_title . $title . $after_title;
        }
		
		$output = '<div class="gm_breadcrumbs__inner uk-invisible">';
		
        if (!is_home() && !is_front_page()) {
			
			
			$list = '<li><a href="'.get_option('home').'">'.$home_title.'</a></li>';

            if (is_single()) {
                if ($cats = get_the_category()) {
                    $cat = $cats[0];

                    if (is_object($cat)) {
                        if ($cat->parent != 0) {
                            $cats = explode("@@@", get_category_parents($cat->term_id, true, "@@@"));

                            unset($cats[count($cats)-1]);
                            $list .= str_replace('<li>@@','<li>', '<li>'.implode("</li><li>", $cats).'</li>');
                        } else {
                            $list .= '<li><a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a></li>';
                        }
                    }
                }
            }

            if (is_category()) {

                $cat_obj = $wp_query->get_queried_object();

                $cats = explode("@@@", get_category_parents($cat_obj->term_id, TRUE, '@@@'));

                unset($cats[count($cats)-1]);

                $cats[count($cats)-1] = '@@<span>'.strip_tags($cats[count($cats)-1]).'</span>';

                $list .= str_replace('<li>@@','<li class="uk-active">', '<li>'.implode("</li><li>", $cats).'</li>');
            } elseif (is_tag()) {
                $list .= '<li class="uk-active"><span>'.single_cat_title('',false).'</span></li>';
            } elseif (is_date()) {
                $list .= '<li class="uk-active"><span>'.single_month_title(' ',false).'</span></li>';
            } elseif (is_author()) {

                $user = !empty($wp_query->query_vars['author_name']) ? get_userdatabylogin($wp_query->query_vars['author']) : get_user_by("id", ((int) $_GET['author']));

                $list .= '<li class="uk-active"><span>'.$user->display_name.'</span></li>';
            } elseif (is_search()) {
                $list .= '<li class="uk-active"><span>'.stripslashes(strip_tags(get_search_query())).'</span></li>';
            } elseif (is_tax()) {
                $taxonomy = get_taxonomy (get_query_var('taxonomy'));
                $term = get_query_var('term');
                $list .= '<li class="uk-active"><span>'.$taxonomy->label .': '.$term.'</span></li>';
            } elseif (is_archive()) {
                // woocommerce shop page
                if (is_plugin_active("woocommerce/woocommerce.php") && is_shop()) {
                    $title = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                    $list .= '<li class="uk-active"><span>'.$title.'</span></li>';
                }
            } else {
                $ancestors = get_ancestors(get_the_ID(), 'page');
                for($i = count($ancestors)-1; $i >= 0; $i--) {
                    $list .= '<li><a href="'.get_page_link($ancestors[$i]).'" title="'.get_the_title($ancestors[$i]).'">'.get_the_title($ancestors[$i]).'</a></li>';
                }
                $list .= '<li class="uk-active"><span>'.get_the_title().'</span></li>';
            }


			$output .= '<ul class="uk-breadcrumb">' . $list . '</ul>';
            
            $output .= '<div class="gm_breadcrumb-mobile uk-hidden" data-uk-dropdown="{mode:\'click\', pos:\'bottom-left\'}">';
				$output .= '<a class="gm_breadcrumb-mobile__toggler">';
					$output .= '<span class="gm_breadcrumb-mobile__toggler__text"></span>';
					$output .= '<span class="gm_breadcrumb-mobile__toggler__arrow"></span>';
				$output .= '</a>';
				
				$output .= '<div class="gm_breadcrumb-mobile__dropdown uk-dropdown">';
					$output .= '<ul class="gm_breadcrumb-mobile__nav uk-nav uk-nav-dropdown">' . $list . '</ul>';
				$output .= '</div>';
			$output .= '</div>';
            

        } else {

            $output = '<ul class="uk-breadcrumb">';

            $output .= '<li class="uk-active"><span>'.$home_title.'</span></li>';

            $output .= '</ul>';

        }
        
        $output .= '</div>';
        

        echo $output;

        echo $after_widget;

    }

    public function update($new_instance, $old_instance)
    {
        return $new_instance;
    }

    public function form($instance)
    {
        $title = isset( $instance['title'] ) ? esc_attr($instance['title']) : '';
        $home_title = isset( $instance['home_title'] ) ? esc_attr($instance['home_title']) : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Title:','warp') ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title') ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title') ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('home_title') ?>"><?php _e('Home title:','warp') ?></label>
            <input type="text" placeholder="Home" name="<?php echo $this->get_field_name('home_title') ?>"  value="<?php echo $home_title ?>" class="widefat" id="<?php echo $this->get_field_id('home_title') ?>">
        </p>
        <?php
    }
}

register_widget('Warp_Breadcrumbs');
