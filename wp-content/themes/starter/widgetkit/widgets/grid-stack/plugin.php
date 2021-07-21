<?php

return array(

    'name' => 'widget/grid-stack',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'grid-stack',
        'label' => 'Grid Stack',
        'core'  => true,
        'icon'  => 'plugins/widgets/grid-stack/widget.svg',
        'view'  => 'plugins/widgets/grid-stack/views/widget.php',
        'item'  => array('title', 'subtitle', 'content', 'media', 'image_alt'),
        'settings' => array(
            'width'             => '1-2',
            'align'             => 'left',
            'breakpoint'        => 'medium',
            'alternate'         => true,
            'gutter'            => true,
            'gutter_vertical'   => 'default',
            'divider'           => false,
            'panel'             => true,
            'content_align'     => true,
            'animation_media'   => 'none',
            'animation_content' => 'none',
            'animation_delay'   => 300,

            'media'             => true,
            'image_size'        => 'full',
            'media_border'      => 'none',
            'media_overlay'     => 'icon',
            'overlay_animation' => 'fade',
            'media_animation'   => 'scale',

            'title'                => true,
            'subtitle'             => true,
            'content'              => true,
            'social_buttons'       => true,
            'title_size'           => 'panel',
            'title_class'          => '',
            'subtitle_size'        => 'panel',
            'subtitle_class'       => '',
            'titles_reverse'       => false,
            'titles_remove_offset' => false,
            'content_size'      => '',
            'text_align'        => 'left',
            'link'              => true,
            'link_style'        => 'button',
            'link_size'         => 'default',
            'link_text'         => 'Read more',
            'badge'             => true,
            'badge_style'       => 'badge',
            'badge_position'    => 'panel',

            'link_target'       => false,
            'link_nofollow'     => false,
            'class'             => ''
        )

    ),

    'events' => array(
	    
	    'init.site' => function($event, $app) {
        },

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('grid-stack.edit', 'plugins/widgets/grid-stack/views/edit.php', true);
        }

    )

);
