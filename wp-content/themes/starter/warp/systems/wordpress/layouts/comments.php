<?php if (comments_open() || have_comments()) : ?>
    
    <div id="comments" class="gm_comment">


        <?php if (have_comments()) : ?>

            <h3 class="uk-h4"><?php printf(__('Comments (%s)', 'warp'), get_comments_number()); ?></h3>

            <?php

                $classes = array("level1");

                if (get_option('comment_registration') && !is_user_logged_in()) {
                    $classes[] = "no-response";
                }

                if (get_option('thread_comments')) {
                    $classes[] = "nested";
                }

            ?>

            <ul class="uk-comment-list">
            <?php

                // single comment
                function mytheme_comment($comment, $args, $depth)
                {
                    global $user_identity;

                    $GLOBALS['comment'] = $comment;

                    $_GET['replytocom'] = get_comment_ID();
                    ?>
                    
                    <li>
                        <article id="comment-<?php comment_ID(); ?>" class="gm_item uk-comment" itemprop="comment" itemscope itemtype="http://schema.org/UserComments">

                            <header class="uk-comment-header">

                                <?php echo get_avatar($comment, $size='75', null, 'Avatar'); ?>
								
                                <h3 class="uk-comment-title" itemprop="creator" itemscope itemtype="http://schema.org/Person">
	                                <span itemprop="name"><?php echo get_comment_author_link(); ?></span>
	                            </h3>

                                <div class="gm_item__meta uk-comment-meta">
                                    <time itemprop="commentTime" datetime="<?php echo get_comment_date('Y-m-d'); ?>">
                                    	<?php echo get_comment_time(); ?>, <?php echo get_comment_date(); ?>
                                    </time>
                                </div>
								
								
                            </header>

                            <div class="uk-comment-body">

                                <div itemprop="commentText">
	                                
	                                <?php comment_text(); ?>
	                            
									<ul class="gm_item__links">
										<li>
											<a title="<?php _e ("Link" , "warp"); ?>" href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>" data-uk-tooltip>
												<i class="fas fa-link"></i>
											</a>
										</li>
										
										<?php if ( get_edit_comment_link() ): ?>
										<li>
											<a href="<?php echo get_edit_comment_link(); ?>" class="gm_item__reply js-reply" title="<?php _e( "Edit", "warp" ); ?>" data-uk-tooltip>
				                                <i class="fas fa-edit"></i>
				                            </a>
										</li>
										<?php endif; ?>
										
										<?php if ( comments_open () && $args['max_depth'] > $depth ) : ?>
		                                <li>
			                                <a href="#" class="gm_item__reply js-reply" title="<?php _e( "Reply", "warp" ); ?>" rel="<?php comment_ID(); ?>" data-uk-tooltip>
				                                <i class="fas fa-reply"></i>
				                            </a>
			                            </li>
		                                <?php endif; ?>
	                                </ul>
	                            </div>
                                
                                

                                <?php if ($comment->comment_approved == '0') : ?>
                                <div class="uk-alert uk-alert-warning"><?php _e('Your comment is awaiting moderation.', 'warp'); ?></div>
                                <?php endif; ?>

                            </div>

                        </article>
                    <?php
                    unset($_GET['replytocom']);

                    // </li> is rendered by system
                }

                wp_list_comments('type=all&callback=mytheme_comment');
            ?>
            </ul>

            <?php echo $this->render("_pagination", array("type"=>"comments")); ?>

        <?php endif; ?>


        <div id="respond" class="gm_comment-respond uk-panel uk-panel-box uk-panel-box-white">

            <h3 class="uk-h4"><?php (comments_open()) ? comment_form_title(__('Leave a comment', 'warp')) : _e('Comments are closed', 'warp'); ?></h3>

            <?php if (comments_open()) : ?>
            	
            	<?php if (!get_option('comment_registration') && !is_user_logged_in()) : ?>
                    <div class="uk-alert"><?php printf(__('You can <a href="%s">login</a> in order not to fill in additional fields.', 'warp'), wp_login_url(get_permalink())); ?></div>
                <?php endif; ?>
            	

                <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
                    <div class="uk-alert uk-alert-warning"><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'warp'), wp_login_url(get_permalink())); ?></div>
                
                <?php else : ?>

                    <form class="uk-form comment-form" id="commentform" name="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

                        <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
							
	                        <?php if (is_user_logged_in()) : ?>
	
	                            <?php global $user_identity; ?>
	
	                            <div class="uk-width-1-1"><p><?php printf(__('Logged in as <a href="%s">%s</a>.', 'warp'), get_option('siteurl').'/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'warp'); ?>"><?php _e('Log out &raquo;', 'warp'); ?></a></p></div>
	
	                        <?php else : ?>
								
	                            <?php $req = get_option('require_name_email');?>
	
								
		                            <div class="uk-width-small-1-2 <?php if ($req) echo "required"; ?>">
		                                <input type="text" name="author" class="uk-width-1-1" placeholder="<?php _e('Name', 'warp'); ?> <?php if ($req) echo "*"; ?>" value="<?php echo esc_attr($comment_author); ?>" <?php if ($req) echo "aria-required='true'"; ?>>
		                            </div>
		
		                            <div class="uk-width-small-1-2 <?php if ($req) echo "required"; ?>">
		                                <input type="text" name="email" class="uk-width-1-1" placeholder="<?php _e('E-mail', 'warp'); ?> <?php if ($req) echo "*"; ?>" value="<?php echo esc_attr($comment_author_email); ?>" <?php if ($req) echo "aria-required='true'"; ?>>
		                            </div>
	                        
	                        <?php endif; ?>
                        
							<div class="uk-width-1-1">
	                            <textarea name="comment" class="uk-width-1-1" placeholder="<?php _e('Comment', 'warp'); ?> *" id="comment" cols="80" rows="5" tabindex="4"></textarea>
	                        </div>
								
							<div class="uk-width-1-1">
								
								<div class="uk-form-row">
			                        <span class="wpcf7-checkbox column">
			                        	<span class="wpcf7-list-item">
											<label for="cren_subscribe_to_comment">
												<input id="cren_subscribe_to_comment" name="cren_subscribe_to_comment" type="checkbox" value="on">
												<span class="wpcf7-list-item-label"><?php _e('Subscribe to comment', 'warp'); ?></span>
											</label>
			                        	</span>
			                        </span>
								</div>
	                        
								
		                        <?php if (!is_user_logged_in()) : ?>
			                        <div class="uk-form-row">
										<?php global $post; do_action('comment_form', $post->ID); ?>
			                        </div>
									
									<div class="uk-form-row">
				                        <noindex>
					                        <span class="wpcf7-checkbox comment-consent-label">
												<span class="wpcf7-list-item">
													<label>
														<input type="checkbox" name="comment-gdpr-accept" value="1" />
														<span class="wpcf7-list-item-label">
															<?php _e('I consent to the processing of personal data', 'warp'); ?>.
															<a href="#comment-consent" data-uk-modal=""><?php _e( "More", "warp"); ?></a> *
														</span>
													</label>
												</span>
											</span>
				                        </noindex>
									</div>
								<?php endif; ?>
							
							</div>
							
							
	                        <div class="uk-width-1-1 gm_comment-respond__buttons actions">
		                        <?php if (!is_user_logged_in()) : ?><?php echo apply_filters( 'gglcptch_display_recaptcha', '', 'commentform' ); ?><?php endif; ?>
	                            <button class="gm_comment-respond__send uk-button uk-button-primary" name="submit" type="submit" id="submit" tabindex="5"><?php _e('Submit Comment', 'warp'); ?></button>
	                            
	                            <?php comment_id_fields(); ?>
	                        </div>
	                        
	                        
	                        
						</div>
						
						

                    </form>
                 

                <?php endif; ?>

            <?php endif; ?>

        </div>
        
    </div>

    <script type="text/javascript">

        jQuery(function($) {

            var respond = $("#respond");

            $(".js-reply").bind("click", function(){

                var id = $(this).attr('rel');

                respond.find(".comment-cancelReply:first").remove();

                $('<a><?php echo __("Cancel");?></a>').addClass('gm_comment-respond__cancel comment-cancelReply uk-button').attr('href', "#respond").bind("click", function(){
                    respond.find(".comment-cancelReply:first").remove();
                    respond.appendTo($('#comments')).find("[name=comment_parent]").val(0);

                    return false;
                }).appendTo(respond.find(".actions:first"));

                respond.find("[name=comment_parent]").val(id);
                respond.appendTo($("#comment-"+id));

                return false;

            });
        });

    </script>

<?php endif;
