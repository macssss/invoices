<?php

return array(

    'name' => 'widget/slideshow-panel',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'slideshow-panel',
        'label' => 'Slideshow Panel',
        'core'  => true,
        'icon'  => 'plugins/widgets/slideshow-panel/widget.svg',
        'view'  => 'plugins/widgets/slideshow-panel/views/widget.php',
        'item'  => array('title', 'content', 'media'),
        'settings' => array(
            'panel'                => 'blank',
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
            'fullscreen'           => false,
            'fullwidth'            => false,
            'min_height'           => '300',

            'media'                => true,
            'image_size'           => 'full',
            'media_align'          => 'top',
            'media_width'          => '1-2',
            'media_breakpoint'     => 'medium',
            'content_align'        => true,

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
            'date_format'          => 'medium',
            'class'                => ''
        )

    ),

    'events' => array(

        'init.site' => function($event, $app) {
        },

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('slideshow-panel.edit', 'plugins/widgets/slideshow-panel/views/edit.php', true);
        }

    )

);
