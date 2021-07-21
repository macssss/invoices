<style>@import url('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&subset=latin-ext'); a{text-decoration: none !important; color: #6194e5 !important;}</style>

<p style="text-align: center; margin: 32px 0;">
<a href="https://starter.garmax.pl/" target="_blank" style="display: inline-block; width: 300px; height: 84px; border: none;">
	<img src="https://starter.garmax.pl/wp-content/uploads/images/mails/mail-logo.jpg" alt="Starter" title="Starter" width="300" height="84" style="display: block; width: 300px; height: 84px; border: none;">
</a>
</p>

<h1 style="font-family: 'Open Sans', sans-serif; font-size: 34px; line-height: 1.4; font-weight: normal; color: #333333; text-align: center; margin: 0; margin-top: 48px; margin-bottom: 16px;"><?php printf(__('Hi %s', 'cren-plugin'), '<strong>'.$parent->comment_author.'</strong>') ?></h1>

<p style="font-family: 'Open Sans', sans-serif; font-size: 16px; line-height: 1.6; color: #555555; margin: 16px 0; text-align: center;"><?php printf(__('%s has replied to your comment on', 'cren-plugin'), '<strong>'.$parent->comment_author.'</strong>') ?></p>

<p style="font-family: 'Open Sans', sans-serif; font-size: 16px; line-height: 1.6; color: #555555; margin: 16px 0; text-align: center;"><a href="<?php echo get_permalink($parent->comment_post_ID) ?>"><?php echo get_the_title($parent->comment_post_ID) ?></a></p>

<p style="font-family: 'Open Sans', sans-serif; font-size: 16px; line-height: 1.6; color: #555555; margin: 16px 0; text-align: center;"><em><?php echo esc_html($comment->comment_content) ?></em>

<p style="font-family: 'Open Sans', sans-serif; font-size: 16px; line-height: 1.6; color: #555555; margin: 16px 0; text-align: center;"><a href="<?php echo get_comment_link($parent->comment_ID) ?>"><?php echo __('Click here to reply', 'cren-plugin') ?></a>, <a href="<?php echo cren_get_unsubscribe_link($parent) ?>"><?php echo __('Click here to stop receiving these messages', 'cren-plugin') ?></a></p>