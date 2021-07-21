<?php

return array(

    'name' => 'widget/parallax',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'parallax',
        'label' => 'Parallax',
        'core'  => true,
        'icon'  => 'plugins/widgets/parallax/widget.svg',
        'view'  => 'plugins/widgets/parallax/views/widget.php',
        'item'  => array('title', 'subtitle', 'content', 'media', 'image_alt'),
        'fields' => array(
	        
	        array(
                'type' => 'media',
                'name' => 'media-mobile',
                'label' => 'Media Mobile'
            ),
        ),
        'settings' => array(
	        'orientation'              => 'up',
	        'scale'                    => 2,
	        'vertical_offset'          => '',
            'fullscreen'               => false,
            'min_height'               => '400',
            'overlay_background'       => '',
            'contrast'                 => true,

            'title'                    => true,
            'subtitle'                 => true,
            'content'                  => true,
            'title_size'               => 'panel',
            'title_class'              => '',
            'subtitle_size'            => 'panel',
            'subtitle_class'           => '',
            'titles_reverse'           => false,
            'titles_remove_offset'     => false,
            'content_size'             => 'large',
            'text_align'               => 'center',
            'link'                     => true,
            'link_style'               => 'button',
            'link_size'                => 'default',
            'link_text'                => 'Read more',
            'inner_container'          => false,
            'inner_container_large'    => false,
            'width'                    => '9-10',
            'width_small'              => '4-5',
            'width_medium'             => '2-3',
            'width_large'              => '1-2',

            'link_target'              => false,
            'link_nofollow'            => false,
            'class'                    => ''
        )

    ),

    'events' => array(

        'init.site' => function($event, $app) {
        },

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('parallax.edit', 'plugins/widgets/parallax/views/edit.php', true);
        }

    )

);
