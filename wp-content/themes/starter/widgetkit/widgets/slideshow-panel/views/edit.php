<div class="uk-grid uk-grid-divider uk-form uk-form-horizontal" data-uk-grid-margin>
    <div class="uk-width-medium-1-4">

        <div class="wk-panel-marginless">
            <ul class="uk-nav uk-nav-side" data-uk-switcher="{connect:'#nav-content'}">
                <li><a href="">Slideshow</a></li>
                <li><a href="">{{'Media' | trans}}</a></li>
                <li><a href="">{{'Content' | trans}}</a></li>
                <li><a href="">{{'General' | trans}}</a></li>
            </ul>
        </div>

    </div>
    <div class="uk-width-medium-3-4">

        <ul id="nav-content" class="uk-switcher">
            <li>

                <h3 class="wk-form-heading">{{'Panel' | trans}}</h3>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-panel">{{'Style' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-panel" class="uk-form-width-medium" ng-model="widget.data['panel']">
                            <option value="blank">{{'Blank' | trans}}</option>
                            <option value="box">{{'Box' | trans}}</option>
                            <option value="white">{{'Box White' | trans}}</option>
                            <option value="secondary">{{'Box Secondary' | trans}}</option>
                            <option value="dark">{{'Box Dark' | trans}}</option>
                            <option value="primary">{{'Box Primary' | trans}}</option>
                        </select>
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Navigation' | trans}}</h3>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-nav">{{'Navigation' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-nav" class="uk-form-width-medium" ng-model="widget.data['nav']">
                            <option value="none">{{'None' | trans}}</option>
                            <option value="dotnav">{{'Dotnav' | trans}}</option>
                            <option value="thumbnails">{{'Thumbnails' | trans}}</option>
                        </select>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.nav != 'none'">
                            <label><input type="checkbox" ng-model="widget.data['nav_overlay']"> {{'Position the nav as media overlay.' | trans}}</label>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.nav != 'none'">
                            <label>
                                <select class="uk-form-width-small" ng-model="widget.data['nav_align']">
                                    <option value="left">{{'Left' | trans}}</option>
                                    <option value="center">{{'Center' | trans}}</option>
                                    <option value="right">{{'Right' | trans}}</option>
                                    <option value="justify">{{'Justify' | trans}} ({{'Only Thumbnails' | trans}})</option>
                                </select>
                                {{'Alignment' | trans}}
                            </label>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.nav == 'thumbnails'">
					        <label>
					            <select id="wk-image-size" class="uk-form-width-mini" ng-model="widget.data['thumbnail_size']">
						            <option value="full">full</option>
					                <?php foreach ( get_intermediate_image_sizes() as $gm_image_size ) : ?>
					                    <option value="<?php echo $gm_image_size; ?>"><?php echo $gm_image_size; ?></option>
					                <?php endforeach; ?>
					            </select>
					            {{'Thumbnail Size' | trans}}
					        </label>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.nav == 'thumbnails'">
                            <label><input type="checkbox" ng-model="widget.data['thumbnail_alt']"> {{'Use second image as thumbnail.' | trans}}</label>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-slidenav">{{'Slidenav' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-slidenav" class="uk-form-width-medium" ng-model="widget.data['slidenav']">
                            <option value="none">{{'None' | trans}}</option>
                            <option value="default">{{'Default' | trans}}</option>
                            <option value="top-left">{{'Top/Left' | trans}}</option>
                            <option value="top-right">{{'Top/Right' | trans}}</option>
                            <option value="bottom-left">{{'Bottom/Left' | trans}}</option>
                            <option value="bottom-right">{{'Bottom/Right' | trans}}</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Color' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['nav_contrast']"> {{'Use a high-contrast color if overlay.' | trans}}</label>
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Animations' | trans}}</h3>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-animation">{{'Animation' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-animation" class="uk-form-width-medium" ng-model="widget.data['animation']">
                            <option value="fade">{{'Fade' | trans}}</option>
                            <option value="scroll">{{'Scroll' | trans}}</option>
                            <option value="swipe">{{'Swipe' | trans}}</option>
                            <option value="scale">{{'Scale' | trans}}</option>
                            <option value="slice-up">{{'Slice Up' | trans}}</option>
                            <option value="slice-down">{{'Slice Down' | trans}}</option>
                            <option value="slice-up-down">{{'Slice Up Down' | trans}}</option>
                            <option value="fold">{{'Fold' | trans}}</option>
                            <option value="puzzle">{{'Puzzle' | trans}}</option>
                            <option value="boxes">{{'Boxes' | trans}}</option>
                            <option value="boxes-reverse">{{'Boxes Reverse' | trans}}</option>
                            <option value="random-fx">{{'Random Fx' | trans}}</option>
                        </select>
                        <p class="uk-form-controls-condensed" ng-if="(['slice-up', 'slice-down', 'slice-up-down', 'fold', 'puzzle', 'boxes', 'boxes-reverse', 'random-fx'].indexOf(widget.data.animation) > -1)">
                            <label><input class="uk-form-width-mini" type="text" ng-model="widget.data['slices']"> {{'Slices' | trans}}</label>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-duration">{{'Duration (ms)' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-duration" class="uk-form-width-medium" type="text" ng-model="widget.data['duration']">
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Autoplay' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['autoplay']"> {{'Enable autoplay' | trans}}</label>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.autoplay">
                            <label><input class="uk-form-width-small" type="text" ng-model="widget.data['interval']"> Interval (ms)</label>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.autoplay">
                            <label><input type="checkbox" ng-model="widget.data['autoplay_pause']"> {{'Pause autoplay when hovering the slideshow' | trans}}</label>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label">Kenburns</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['kenburns']"> {{'Enable Kenburns effect on the image' | trans}}</label>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.kenburns">
                            <label>
                                <select class="uk-form-width-small" ng-model="widget.data['kenburns_animation']">
                                    <option value="">{{'Default' | trans}}</option>
                                    <option value="uk-animation-middle-center">{{'Center' | trans}}</option>
                                    <option value="uk-animation-bottom-center">{{'Top' | trans}}</option>
                                    <option value="uk-animation-top-center">{{'Bottom' | trans}}</option>
                                    <option value="uk-animation-middle-right">{{'Left' | trans}}</option>
                                    <option value="uk-animation-middle-left">{{'Right' | trans}}</option>
                                    <option value="uk-animation-bottom-right">{{'Top Left' | trans}}</option>
                                    <option value="uk-animation-bottom-left">{{'Top Right' | trans}}</option>
                                    <option value="uk-animation-top-right">{{'Bottom Left' | trans}}</option>
                                    <option value="uk-animation-top-left">{{'Bottom Right' | trans}}</option>
                                </select>
                                {{'Animation' | trans}}
                            </label>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.kenburns">
                            <label><input class="uk-form-width-mini" type="text" ng-model="widget.data['kenburns_duration']"> {{'Duration in seconds' | trans}}</label>
                        </p>
                    </div>
                </div>
                
                <h3 class="wk-form-heading">{{'Width' | trans}}</h3>
                
                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Fullwidth' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['fullwidth']"> {{'Yes' | trans}}</label>
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Height' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Fullscreen' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['fullscreen']"> {{'Extend to full viewport height' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-min-height">{{'Min. Height (px)' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-min-height" class="uk-form-width-medium" type="text" ng-model="widget.data['min_height']">
                    </div>
                </div>

            </li>
            <li>

                <h3 class="wk-form-heading">{{'Media' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['media']"> {{'Show media' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
			        <label class="uk-form-label" for="wk-image-size">{{'Image Size' | trans}}</label>
			        <div class="uk-form-controls">
			            <select id="wk-image-size" class="uk-form-width-medium" ng-model="widget.data['image_size']">
				            <option value="full">full</option>
			                <?php foreach ( get_intermediate_image_sizes() as $gm_image_size ) : ?>
			                    <option value="<?php echo $gm_image_size; ?>"><?php echo $gm_image_size; ?></option>
			                <?php endforeach; ?>
			            </select>
			        </div>
			    </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-media-align">{{'Alignment' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-media-align" class="uk-form-width-medium" ng-model="widget.data['media_align']">
                            <option value="top">{{'Top' | trans}}</option>
                            <option value="left">{{'Left' | trans}}</option>
                            <option value="right">{{'Right' | trans}}</option>
                        </select>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.media_align == 'left' || widget.data.media_align == 'right'">
                            <label>
                                <select class="uk-form-width-mini" ng-model="widget.data['media_width']">
                                    <option value="1-5">20%</option>
                                    <option value="1-4">25%</option>
                                    <option value="3-10">30%</option>
                                    <option value="1-3">33%</option>
                                    <option value="2-5">40%</option>
                                    <option value="1-2">50%</option>
                                    <option value="3-5">60%</option>
                                    <option value="2-3">66%</option>
                                </select>
                                {{'Column Width' | trans}}
                            </label>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.media_align == 'left' || widget.data.media_align == 'right'">
                            <label>
                                <select class="uk-form-width-small" ng-model="widget.data['media_breakpoint']">
                                    <option value="small">{{'Phone Landscape' | trans}}</option>
                                    <option value="medium">{{'Tablet' | trans}}</option>
                                    <option value="large">{{'Desktop' | trans}}</option>
                                </select>
                                {{'Breakpoint' | trans}}
                            </label>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.media_align == 'left' || widget.data.media_align == 'right'">
                            <label><input type="checkbox" ng-model="widget.data['content_align']"> {{'Center content vertically' | trans}}</label>
                        </p>
                    </div>
                </div>

            </li>
            <li>

                <h3 class="wk-form-heading">{{'Text' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" ng-model="widget.data['title']"> {{'Show title' | trans}}</label>
                        </p>
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" ng-model="widget.data['subtitle']"> {{'Show subtitle' | trans}}</label>
                        </p>
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" ng-model="widget.data['content']"> {{'Show content' | trans}}</label>
                        </p>
                    </div>
                </div>
                
                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-title-size">{{'Title Size' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-title-size" class="uk-form-width-medium" ng-model="widget.data['title_size']">
                            <option value="panel">{{'Default' | trans}}</option>
                            <option value="h1">H1</option>
                            <option value="h2">H2</option>
                            <option value="h3">H3</option>
                            <option value="h4">H4</option>
                            <option value="h5">H5</option>
                            <option value="h6">H6</option>
                            <option value="large">{{'Extra Large' | trans}}</option>
                        </select>
                    </div>
                </div>
                
                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-title-class">{{'Title Class' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-title-class" class="uk-form-width-medium" type="text" ng-model="widget.data['title_class']">
                    </div>
                </div>
                
                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-subtitle-size">{{'Subtitle Size' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-subtitle-size" class="uk-form-width-medium" ng-model="widget.data['subtitle_size']">
                            <option value="panel">{{'Default' | trans}}</option>
                            <option value="h1">H1</option>
                            <option value="h2">H2</option>
                            <option value="h3">H3</option>
                            <option value="h4">H4</option>
                            <option value="h5">H5</option>
                            <option value="h6">H6</option>
                            <option value="large">{{'Extra Large' | trans}}</option>
                        </select>
                    </div>
                </div>
                
                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-subtitle-class">{{'Subtitle Class' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-subtitle-class" class="uk-form-width-medium" type="text" ng-model="widget.data['subtitle_class']">
                    </div>
                </div>
                
                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Titles' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" ng-model="widget.data['titles_reverse']"> {{'Reverse' | trans}}</label>
                        </p>
                        
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" ng-model="widget.data['titles_remove_offset']"> {{'Remove offset' | trans}}</label>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-content-size">{{'Content Size' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-content-size" class="uk-form-width-medium" ng-model="widget.data['content_size']">
                            <option value="">{{'Default' | trans}}</option>
                            <option value="small">{{'Small' | trans}}</option>
                            <option value="large">{{'Large' | trans}}</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-text-align">{{'Alignment' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-text-align" class="uk-form-width-medium" ng-model="widget.data['text_align']">
                            <option value="left">{{'Left' | trans}}</option>
                            <option value="right">{{'Right' | trans}}</option>
                            <option value="center">{{'Center' | trans}}</option>
                        </select>
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Link' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['link']"> {{'Show link' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-link-style">{{'Style' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-link-style" class="uk-form-width-medium" ng-model="widget.data['link_style']">
                            <option value="text">{{'Text' | trans}}</option>
                            <option value="button">{{'Button' | trans}}</option>
                            <option value="secondary">{{'Button Secondary' | trans}}</option>
                            <option value="dark">{{'Button Dark' | trans}}</option>
                            <option value="primary">{{'Button Primary' | trans}}</option>
                            <option value="secondary-invert">{{'Button Secondary Invert' | trans}}</option>
                            <option value="dark-invert">{{'Button Dark Invert' | trans}}</option>
                            <option value="primary-invert">{{'Button Primary Invert' | trans}}</option>
                            <option value="button-link">{{'Button Link' | trans}}</option>
                        </select>
                    </div>
                </div>
                
                <div class="uk-form-row" ng-if="widget.data.link_style != 'text'">
                    <label class="uk-form-label" for="wk-link-size">{{'Size' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-link-size" class="uk-form-width-medium" ng-model="widget.data['link_size']">
                            <option value="default">{{'Button Default' | trans}}</option>
                            <option value="mini">{{'Button Mini' | trans}}</option>
                            <option value="small">{{'Button Small' | trans}}</option>
                            <option value="large">{{'Button Large' | trans}}</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-link-text">{{'Text' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-link-text" class="uk-form-width-medium" type="text" ng-model="widget.data['link_text']">
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Badge' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['badge']"> {{'Show badge' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-badge-style">{{'Style' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-badge-style" class="uk-form-width-medium" ng-model="widget.data['badge_style']">
                            <option value="badge">{{'Default' | trans}}</option>
                            <option value="success">{{'Success' | trans}}</option>
                            <option value="warning">{{'Warning' | trans}}</option>
                            <option value="danger">{{'Danger' | trans}}</option>
                            <option value="text-muted">{{'Text Muted' | trans}}</option>
                            <option value="text-primary">{{'Text Primary' | trans}}</option>
                        </select>
                    </div>
                </div>

            </li>
            <li>

                <h3 class="wk-form-heading">{{'General' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Link Target' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['link_target']"> {{'Open all links in a new window' | trans}}</label>
                    </div>
                </div>
                
                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Link Nofollow' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['link_nofollow']"> {{'Set rel nofollow for all links' | trans}}</label>
                    </div>
                </div>
                
                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-date-format">{{'Date Format' | trans}}</label>
                    <div class="uk-form-controls uk-form-controls-text">
                        <select id="wk-date-format" class="uk-form-width-medium" ng-model="widget.data['date_format']">
                            <option value="full">{{'Full' | trans}}</option>
                            <option value="long">{{'Long' | trans}}</option>
                            <option value="medium">{{'Medium' | trans}}</option>
                            <option value="short">{{'Short' | trans}}</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-class">{{'HTML Class' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-class" class="uk-form-width-medium" type="text" ng-model="widget.data['class']">
                    </div>
                </div>

            </li>
        </ul>

    </div>
</div>
