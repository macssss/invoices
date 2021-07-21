<?php

return array(

    'name' => 'widget/grid',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'grid',
        'label' => 'Grid',
        'core'  => true,
        'icon'  => 'plugins/widgets/grid/widget.svg',
        'view'  => 'plugins/widgets/grid/views/widget.php',
        'item'  => array('title', 'subtitle', 'content', 'media', 'image_alt'),
        'fields' => array(
            
            array(
                'type' => 'text',
                'name' => 'icon',
                'label' => 'Icon'
            ),
            
            array(
                'type' => 'text',
                'name' => 'count-value',
                'label' => 'Count'
            ),
            
            array(
                'type' => 'text',
                'name' => 'count-before',
                'label' => 'Count Before'
            ),
            
            array(
                'type' => 'text',
                'name' => 'count-after',
                'label' => 'Count After'
            )
        ),
        'settings' => array(
            'grid'                 => 'default',
            'parallax'             => false,
            'parallax_translate'   => '',
            'gutter'               => 'default',
            'gutter_v'             => '',
            'gutter_dynamic'       => '32',
            'gutter_v_dynamic'     => '',
            'filter'               => 'none',
            'filter_tags'          => array(),
            'filter_align'         => 'left',
            'filter_all'           => true,
            'columns'              => '1',
            'columns_small'        => 0,
            'columns_medium'       => 0,
            'columns_large'        => 0,
            'columns_xlarge'       => 0,
            'panel'                => 'blank',
            'panel_link'           => false,
            'animation'            => 'none',
            'animation_delay'      => 300,

            'media'                => true,
            'image_size'           => 'full',
            'media_align'          => 'teaser',
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
            'count_size'           => 'h3',
            'count_before'         => '',
            'count_after'          => '',
            'count_speed'          => '750',
            'count_class'          => '',
            'link'                 => true,
            'link_style'           => 'button',
            'link_size'            => 'default',
            'link_text'            => 'Read more',
            'badge'                => true,
            'badge_style'          => 'badge',
            'badge_position'       => 'panel',

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
            $app['angular']->addTemplate('grid.edit', 'plugins/widgets/grid/views/edit.php', true);
        }

    )

);
