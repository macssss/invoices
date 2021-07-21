<?php

return array(

    'name' => 'widget/accordion',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'accordion',
        'label' => 'Accordion',
        'core'  => true,
        'icon'  => 'plugins/widgets/accordion/widget.svg',
        'view'  => 'plugins/widgets/accordion/views/widget.php',
        'item'  => array('title', 'subtitle', 'content', 'media', 'image_alt'),
        'settings' => array(
            'collapse'             => true,
            'first_item'           => true,

            'media'                => true,
            'image_size'           => 'full',
            'media_align'          => 'top',
            'media_width'          => '1-2',
            'media_breakpoint'     => 'medium',
            'content_align'        => true,
            'media_border'         => 'none',
            'media_overlay'        => 'icon',
            'overlay_animation'    => 'fade',
            'media_animation'      => 'scale',

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
            'content_size'         => '',
            'text_align'           => 'left',
            'link'                 => true,
            'link_style'           => 'button',
            'link_size'            => 'default',
            'link_size'            => 'default',
            'link_text'            => 'Read more',

            'link_target'          => false,
            'link_nofollow'        => false,
            'class'                => ''
        )

    ),

    'events' => array(
	    
	    'init.site' => function($event, $app) {
        },

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('accordion.edit', 'plugins/widgets/accordion/views/edit.php', true);
        }

    )

);
