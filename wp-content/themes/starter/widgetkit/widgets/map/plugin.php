<?php

return array(

    'name' => 'widget/map',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'map',
        'label' => 'Map',
        'core'  => true,
        'icon'  => 'plugins/widgets/map/widget.svg',
        'view'  => 'plugins/widgets/map/views/widget.php',
        'item'  => array('title', 'subtitle', 'content', 'media', 'image_alt'),
        'fields' => array(
	        
	        array('name' => 'location'),
            
        ),
        'settings' => array(
            'width'                   => 'auto',
            'height'                  => 400,
            'maptypeid'               => 'roadmap',
            'map_fullscreen'          => false,
            'maptypecontrol'          => false,
            'mapctrl'                 => true,
            'zoom'                    => 9,
            'marker'                  => 2,
            'marker_icon'             => '',
            'markercluster'           => false,
            'popup_max_width'         => 300,
            'zoomwheel'               => true,
            'draggable'               => true,
            'directions'              => false,
            'disabledefaultui'        => false,
            
            'styler_invert_lightness' => false,
            'styler_hue'              => '',
            'styler_saturation'       => 0,
            'styler_lightness'        => 0,
            'styler_gamma'            => 0,

            'media'                   => true,
            'image_size'              => 'full',
            'media_align'             => 'top',
            'media_width'             => '1-2',
            'media_breakpoint'        => 'medium',
            'media_border'            => 'none',
            'media_overlay'           => 'icon',
            'overlay_animation'       => 'fade',
            'media_animation'         => 'scale',

            'title'                   => true,
            'subtitle'                => true,
            'content'                 => true,
            'social_buttons'          => true,
            'title_size'              => 'panel',
            'title_class'             => '',
            'subtitle_size'           => 'panel',
            'subtitle_class'          => '',
            'titles_reverse'          => false,
            'titles_remove_offset'    => false,
            'content_size'            => '',
            'text_align'              => 'left',
            'link'                    => true,
            'link_style'              => 'button',
            'link_size'               => 'default',
            'link_text'               => 'Read more',

            'link_target'             => false,
            'link_nofollow'       => false,
            'class'                   => ''
        )

    ),

    'events' => array(

        'init.site' => function($event, $app) {

            if ($app['config']->get('googlemapseapikey')) {
                $app['scripts']->add('googlemapsapi', 'GOOGLE_MAPS_API_KEY = "'.$app['config']->get('googlemapseapikey').'";', array(), 'string');
            }

            $app['scripts']->add('widgetkit-maps', 'plugins/widgets/map/assets/maps.js', array('uikit2'));
            $app['scripts']->add('widgetkit-marker', 'plugins/widgets/map/assets/marker-helper.js');
        },

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('map.edit', 'plugins/widgets/map/views/edit.php', true);

            if ($app['config']->get('googlemapseapikey')) {
                $app['scripts']->add('googlemapsapi', 'GOOGLE_MAPS_API_KEY = "'.$app['config']->get('googlemapseapikey').'";', array(), 'string');
            }
        }

    )

);
