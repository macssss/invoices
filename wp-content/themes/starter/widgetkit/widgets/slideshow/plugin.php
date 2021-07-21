<?php

return array(

    'name' => 'widget/slideshow',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'slideshow',
        'label' => 'Slideshow',
        'core'  => true,
        'icon'  => 'plugins/widgets/slideshow/widget.svg',
        'view'  => 'plugins/widgets/slideshow/views/widget.php',
        'item'  => array('title', 'subtitle', 'content', 'media', 'image_alt'),
        'settings' => array(
            'nav'                  => 'dotnav',
            'nav_overlay'          => true,
            'nav_align'            => 'center',
            'thumbnail_size'       => 'small',
            'thumbnail_alt'        => false,
            'slidenav'             => 'default',
            'nav_contrast'         => true,
            'animation'            => 'fade',
            'slices'               => '15',
            'duration'             => '500',
            'autoplay'             => false,
            'interval'             => '7000',
            'autoplay_pause'       => true,
            'kenburns'             => false,
            'kenburns_animation'   => '',
            'kenburns_duration'    => '15',
            'fullwidth'            => false,
            'fullscreen'           => false,
            'min_height'           => '300',

            'media'                => true,
            'image_size'           => 'full',
            'overlay'              => false,
            'overlay_inn_offset'   => false,
            'overlay_out_offset'   => false,
            'overlay_stretch'      => false,
            'overlay_position'     => 'bottom',
            'overlay_animation'    => 'fade',
            'overlay_full'         => true,
            'overlay_background'   => true,
            'link_media'           => false,
            
            'content_width'        => '1-1',
            'content_width_small'  => '',
            'content_width_medium' => '',
            'content_width_large'  => '',
            'content_width_xlarge' => '',

            'title'                => true,
            'subtitle'             => true,
            'content'              => true,
            'title_size'           => 'panel',
            'title_class'          => '',
            'subtitle_size'        => 'panel',
            'subtitle_class'       => '',
            'titles_reverse'       => false,
            'titles_remove_offset' => false,
            'content_size'         => '',
            'text_align'           => 'left',
            'link'                 => true,
            'link_style'           => 'button',
            'link_size'            => 'default',
            'link_text'            => 'Read more',
            'badge'                => true,
            'badge_style'          => 'badge',

            'link_target'          => false,
            'link_nofollow'        => false,
            'class'                => ''
        )

    ),

    'events' => array(

        'init.site' => function($event, $app) {
        },

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('slideshow.edit', 'plugins/widgets/slideshow/views/edit.php', true);
        }

    )

);
