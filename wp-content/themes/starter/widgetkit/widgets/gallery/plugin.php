<?php

return array(

    'name' => 'widget/gallery',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'gallery',
        'label' => 'Gallery',
        'core'  => true,
        'icon'  => 'plugins/widgets/gallery/widget.svg',
        'view'  => 'plugins/widgets/gallery/views/widget.php',
        'item'  => array('title', 'subtitle', 'content', 'media', 'image_alt'),
        'fields' => array(
            array(
                'type' => 'editor',
                'name' => 'lightbox_content',
                'label' => 'Lightbox Content'
            ),
        ),
        'settings' => array(
            'grid'                          => 'default',
            'parallax'                      => false,
            'parallax_translate'            => '',
            'gutter'                        => 'default',
            'gutter_v'                      => '',
            'gutter_dynamic'                => '32',
            'gutter_v_dynamic'              => '',
            'filter'                        => 'none',
            'filter_tags'                   => array(),
            'filter_align'                  => 'left',
            'filter_all'                    => true,
            'columns'                       => '1',
            'columns_small'                 => 0,
            'columns_medium'                => 0,
            'columns_large'                 => 0,
            'columns_xlarge'                => 0,
            'animation'                     => 'none',
            'animation_delay'               => 300,

            'image_size'                    => 'full',
            'media_border'                  => 'none',
            'overlay'                       => 'default',
            'panel'                         => 'blank',
            'overlay_center'                => 'icon',
            'overlay_background'            => 'hover',
            'overlay_image'                 => false,
            'hover_overlay'                 => true,
            'overlay_animation'             => 'fade',
            'image_animation'               => 'scale',

            'title'                         => true,
            'subtitle'                      => true,
            'content'                       => true,
            'title_size'                    => 'panel',
            'title_class'                   => '',
            'subtitle_size'                 => 'panel',
            'subtitle_class'                => '',
            'titles_reverse'                => false,
            'titles_remove_offset'          => false,
            'content_size'                  => '',
            'text_align'                    => 'left',
            'link'                          => false,
            'link_style'                    => 'button',
            'link_size'                     => 'default',
            'link_icon'                     => 'share',
            'link_text'                     => 'View',

            'lightbox'                      => 'default',
            'lightbox_caption'              => 'title',
            'lightbox_nav_image_size'       => 'small',
            'lightbox_nav_contrast'         => true,
            'lightbox_title'                => true,
            'lightbox_subtitle'             => true,
            'lightbox_title_size'           => 'panel',
            'lightbox_title_class'          => '',
            'lightbox_subtitle_size'        => 'panel',
            'lightbox_subtitle_class'       => '',
            'lightbox_titles_reverse'       => false,
            'lightbox_titles_remove_offset' => false,
            'lightbox_content_size'         => '',
            'lightbox_text_align'           => 'left',
            'lightbox_content_width'        => '',
            'lightbox_image_size'           => 'full',

            'lightbox_link'                 => false,
            'lightbox_style'                => 'button',
            'lightbox_size'                 => 'default',
            'lightbox_icon'                 => 'search',
            'lightbox_text'                 => 'Details',

            'link_target'                   => false,
            'link_nofollow'                 => false,
            'class'                         => ''
        )

    ),

    'events' => array(
	    
	    'init.site' => function($event, $app) {
        },

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('gallery.edit', 'plugins/widgets/gallery/views/edit.php', true);
        }

    )

);
