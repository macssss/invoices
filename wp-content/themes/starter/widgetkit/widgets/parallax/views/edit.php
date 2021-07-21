<div class="uk-grid uk-grid-divider uk-form uk-form-horizontal" data-uk-grid-margin>
    <div class="uk-width-medium-1-4">

        <div class="wk-panel-marginless">
            <ul class="uk-nav uk-nav-side" data-uk-switcher="{connect:'#nav-content'}">
                <li><a href="">Parallax</a></li>
                <li><a href="">{{'Content' | trans}}</a></li>
                <li><a href="">{{'General' | trans}}</a></li>
            </ul>
        </div>

    </div>
    <div class="uk-width-medium-3-4">

        <ul id="nav-content" class="uk-switcher">
            <li>
            
            	<h3 class="wk-form-heading">{{'Parallax' | trans}}</h3>
            	
            	<div class="uk-form-row">
                    <label class="uk-form-label" for="wk-orientation">{{'Orientation' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-orientation" class="uk-form-width-medium" ng-model="widget.data['orientation']">
                            <option value="up">Up</option>
                            <option value="right">Right</option>
                            <option value="down">Down</option>
                            <option value="left">Left</option>
                            <option value="up left">Up Left</option>
                            <option value="up right">Up Right</option>
                            <option value="down left">Down Left</option>
                            <option value="down right">Down Right</option>
                        </select>
                    </div>
                </div>
                
                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-scale">{{'Sacle' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-scale" class="uk-form-width-medium" type="text" ng-model="widget.data['scale']">
                    </div>
                </div>
                
                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-vertial-offset">{{'Vertical Offset' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-vertial-offset" class="uk-form-width-medium" ng-model="widget.data['vertical_offset']">
                            <option value="">Default</option>
                            <option value="mini">Mini</option>
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="large">Large</option>
                            <option value="xlarge">X-Large</option>
                            <option value="collapse">Collapse</option>
                        </select>
                    </div>
                </div>
				
				<div class="uk-form-row">
                    <span class="uk-form-label">{{'Fullscreen' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['fullscreen']"> {{'Extend to full viewport height' | trans}}</label>
                    </div>
                </div>
				
                <div class="uk-form-row" ng-if="widget.data.fullscreen == false">
                    <label class="uk-form-label" for="wk-min-height">{{'Min. Height (px)' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-min-height" class="uk-form-width-medium" type="text" ng-model="widget.data['min_height']">
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-background-color">{{'Background Color Overlay' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-background-color" class="uk-form-width-medium" type="text" ng-model="widget.data['overlay_background']">
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Color' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['contrast']"> {{'Use a high-contrast color.' | trans}}</label>
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
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" ng-model="widget.data['social_buttons']"> {{'Show social buttons' | trans}}</label>
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

                <h3 class="wk-form-heading">{{'Width' | trans}}</h3>
                
                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Inner Container' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['inner_container']"> {{'Yes' | trans}}</label>
                    </div>
                </div>
                
                <div class="uk-form-row" ng-if="widget.data.inner_container == true">
                    <span class="uk-form-label">{{'Inner Container Large' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['inner_container_large']"> {{'Yes' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row" ng-if="widget.data.inner_container == false">
                    <label class="uk-form-label" for="wk-width">{{'Phone Portrait' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-width" class="uk-form-width-medium" ng-model="widget.data['width']">
                            <option value="1-2">50%</option>
                            <option value="3-5">60%</option>
                            <option value="2-3">66%</option>
                            <option value="7-10">70%</option>
                            <option value="3-4">75%</option>
                            <option value="4-5">80%</option>
                            <option value="9-10">90%</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row" ng-if="widget.data.inner_container == false">
                    <label class="uk-form-label" for="wk-width-small">{{'Phone Landscape' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-width-small" class="uk-form-width-medium" ng-model="widget.data['width_small']">
                            <option value="">{{'Inherit' | trans}}</option>
                            <option value="1-2">50%</option>
                            <option value="3-5">60%</option>
                            <option value="2-3">66%</option>
                            <option value="7-10">70%</option>
                            <option value="3-4">75%</option>
                            <option value="4-5">80%</option>
                            <option value="9-10">90%</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row" ng-if="widget.data.inner_container == false">
                    <label class="uk-form-label" for="wk-width-medium">{{'Tablet' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-width-medium" class="uk-form-width-medium" ng-model="widget.data['width_medium']">
                            <option value="">{{'Inherit' | trans}}</option>
                            <option value="1-2">50%</option>
                            <option value="3-5">60%</option>
                            <option value="2-3">66%</option>
                            <option value="7-10">70%</option>
                            <option value="3-4">75%</option>
                            <option value="4-5">80%</option>
                            <option value="9-10">90%</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row" ng-if="widget.data.inner_container == false">
                    <label class="uk-form-label" for="wk-width-large">{{'Desktop' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-width-large" class="uk-form-width-medium" ng-model="widget.data['width_large']">
                            <option value="">{{'Inherit' | trans}}</option>
                            <option value="1-3">33%</option>
                            <option value="2-5">40%</option>
                            <option value="1-2">50%</option>
                            <option value="3-5">60%</option>
                            <option value="2-3">66%</option>
                            <option value="7-10">70%</option>
                            <option value="3-4">75%</option>
                            <option value="4-5">80%</option>
                            <option value="9-10">90%</option>
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
                    <label class="uk-form-label" for="wk-class">{{'HTML Class' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-class" class="uk-form-width-medium" type="text" ng-model="widget.data['class']">
                    </div>
                </div>

            </li>
        </ul>

    </div>
</div>
