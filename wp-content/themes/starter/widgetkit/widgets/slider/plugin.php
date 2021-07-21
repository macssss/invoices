<?php

return array(

    'name' => 'widget/slider',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'slider',
        'label' => 'Slider',
        'core'  => true,
        'icon'  => 'plugins/widgets/slider/widget.svg',
        'view'  => 'plugins/widgets/slider/views/widget.php',
        'item'  => array('title', 'subtitle', 'content', 'media', 'image_alt'),
        'settings' => array(
	        'container_offset'         => false,
            'slidenav'                 => true,
            'slidenav_contrast'        => false,
            'infinite'                 => true,
            'center'                   => false,
            'autoplay'                 => false,
            'interval'                 => '7000',
            'autoplay_pause'           => true,
            'gutter'                   => 'default',
            'columns'                  => '1',
            'columns_small'            => 0,
            'columns_medium'           => 0,
            'columns_large'            => 0,
            'columns_xlarge'           => 0,
            'panel'                    => 'blank',
            'panel_link'               => false,

            'media'                    => true,
            'image_size'               => 'full',
            'media_align'              => 'teaser',
            'media_border'             => 'none',
            'media_overlay'            => 'icon',
            'overlay_animation'        => 'fade',
            'media_animation'          => 'scale',

            'title'                    => true,
            'subtitle'                 => true,
            'content'                  => true,
            'social_buttons'           => true,
            'title_size'               => 'panel',
            'title_class'              => '',
            'subtitle_size'            => 'panel',
            'subtitle_class'           => '',
            'titles_reverse'           => false,
            'titles_remove_offset'     => false,
            'content_size'             => '',
            'text_align'               => 'center',
            'link'                     => true,
            'link_style'               => 'button',
            'link_size'                => 'default',
            'link_text'                => 'Read more',
            'badge'                    => true,
            'badge_style'              => 'badge',
            'badge_position'           => 'panel',

            'link_target'              => false,
            'link_nofollow'            => false,
            'class'                    => ''
        )

    ),

    'events' => array(

        'init.site' => function($event, $app) {
        },

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('slider.edit', 'plugins/widgets/slider/views/edit.php', true);
        }

    )

);
