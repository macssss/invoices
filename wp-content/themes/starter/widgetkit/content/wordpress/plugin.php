<?php

$config = array(

    'name' => 'content/wordpress',

    'main' => 'YOOtheme\\Widgetkit\\Content\\Type',

    'config' => array(

        'name'  => 'wordpress',
        'label' => 'WordPress',
        'icon'  => 'plugins/content/wordpress/content.svg',
        'item'  => array('title', 'content', 'media', 'link'),
        'data'  => array(
            'number'           => 5,
            'only_sticky'      => false,
            'default_image_id' => '',
            'title_limit'      => 0,
            'content_limit'    => 0,
            'content'          => 'intro',
            'category'         => array(),
            'order_by'         => 'post_date',
            'author'           => 'author',
            'date'             => 'publish_up',
            'categories'       => 'categories'
        )

    ),

    'items' => function($items, $content, $app) {
		
		
        $order = explode('_asc', $content['order_by']);
        
        $args  = array(
            'numberposts' => $content['number'] ?: 5,
            'orderby'     => isset($order[0]) ? $order[0] : 'post_date',
            'order'       => isset($order[1]) ? 'ASC' : 'DESC',
            'post_status' => 'publish',
        );
        
        if ( $content['category'] > 0 ) {
            
            $args['category'] = implode(',', $content['category']);
        }
        
        if ( $content['only_sticky'] ) {
	        
	        $stickies = get_option( 'sticky_posts' );
	        
	        $args['post__in'] = $stickies;
        }

        foreach (get_posts($args) as $post) {

            $data = array();
			
			$data['its_content'] = true;
			
            $data['title']    = get_the_title($post->ID);
            
            if ( $content['title_limit'] > 0 && strlen( $data['title'] ) > $content['title_limit'] ) {
            	$data['title'] = substr( $data['title'], 0, $content['title_limit'] ) . '...';
            }
            
            $data['link']     = get_permalink($post->ID);
            $data['author']   = $content['author'] ? get_the_author_meta('display_name', $post->post_author) : '';
            
            $data['date']     = $content['date'] ? $post->post_date : '';
			$data['event_date'] = '';
			
			if ( $content['date'] == 'event_date' && get_field('event_date', $post->ID) ) {
				
				$data['event_date'] = get_field('event_date', $post->ID);
			}
			
            $pieces = get_extended($post->post_content);

            switch ($content['content']) {
                case 'excerpt':
                    $excerpt = preg_replace('/^&nbsp;/', '', trim(get_the_excerpt($post)));
                    $data['content'] = $excerpt ? $excerpt : $app['filter']->apply($pieces['main'], 'content');
                    break;
                case 'intro':
                    $data['content'] = $app['filter']->apply($pieces['main'], 'content');
                    break;
                default:
                    $data['content'] = $app['filter']->apply($pieces['main'].$pieces['extended'], 'content');
                    break;
            }
            
            if ( $content['content_limit'] > 0 && strlen( $data['content'] ) > $content['content_limit'] ) {
            	$data['content'] = substr( $data['content'], 0, $content['content_limit'] ) . '...';
            }

            if ($content['categories']) {

                $data['categories'] = array();

                foreach(wp_get_post_categories($post->ID) as $catid) {
                    $cat = get_category($catid);
                    $data['categories'][$cat->name] = esc_url( get_category_link($cat->term_id) );
                }
            }

            if ( $thumbnail = get_post_thumbnail_id( $post->ID ) ) {
	            
                $data['media'] = $thumbnail;
            }
            
            else if ( $content['default_image_id'] ) {
	            
                $data['media'] = $content['default_image_id'];
            }

            $data['tags'] = array();

            if ($tags = get_the_tags($post->ID)) {
                foreach($tags as $tag) {
                    $data['tags'][] = $tag->name;
                }
            }

            // map custom fields
            foreach ((array)$content['mapping'] as $map) {
                if (isset($map['name']) && isset($map['field'])) {
                    $value = get_post_meta($post->ID, $map['field']);
                    $data[$map['name']] = array_shift($value);
                }
            }

            $items->add($data);
        }

    },

    'events' => array(

        'init.admin' => function($event, $app) {
            $app['scripts']->add('widgetkit-wordpress-controller', 'plugins/content/wordpress/assets/controller.js');
            $app['angular']->addTemplate('wordpress.edit', 'plugins/content/wordpress/views/edit.php');
        }

    )

);

return defined('WPINC') ? $config : false;
