=== Display Widgets ===
Contributors: seo-dave
Donate link: https://seo-gold.com/display-widgets-plus-plugin/
Tags: Display Widgets, Widget Logic, Dynamic Widgets, Widget Options, Widget Context
Requires at least: 4.6
Tested up to: 4.9-alpha-41379
Stable tag: 4.0.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html

Widget logic for WordPress, control how widgets are shown, works with the WPML language plugin, BuddyPress Plugin, bbPress Plugin and Custom Post Types.

== Description ==

The Display Widgets Plugin v4.0.0 is a direct upgrade to the now closed Display Widgets Plugin v2.7 from the WordPress Plugin Repository: in September 2017 version 2.6 of the plugin was closed because the current 'owner' (user: `@displaywidget`) had been caught (by yours truly) adding malicious hacking code to the plugin!

The WordPress plugin team closed the plugin, rolled the download back to v2.05 with a new version number (v2.7) and have said the plugin will never be reopened, which means it will never be updated/supported.

As it stands current users of the Display Widgets plugin can upgrade (technically downgrade) to v2.7 under their WordPress Dashboard, but the WordPress Plugin team do not want new sites installing the v2.7 plugin, they want the plugin to die off: doesn't make any sense to me, but it's their call.

The Display Widgets plugin is a good plugin used on over 200,000 WordPress sites without major problems (had small bugs: fixed in v4.0.0) prior to the v2.6 updates and it feels wrong to end it this way, so I've taken the v2.05 plugin code, added bug fixes and new widget logic features.

If a significant number of people upgrade to v4.0.0 I'll develop the code further.

To distance the new version from the hacked version I've jumped direct to version 4.0.0 skipping v3.0.0.

= Display Widgets Plugin v4.0.0 Features =

Note: when the plugin is first installed/activated by default, `Hide on checked pages` is selected with no boxes checked, so all current widgets will continue to display on all pages. After activation go to `Appearance` > `Widgets` to set widget logic options.

WordPress widgets by default include no widget logic, when a widget is added to a widget area it will load sitewide: unless the widget area has widget logic, some themes include widget areas for specific sections of a site.

For example if you want a widget only to load on a specific Static Page or only on Categories the Display Widgets plugin can achieve this.

**Site Section - WordPress Conditional Function**

* Static Front Page - is_front_page()
* Home Page Archives - is_home()
* Category Archives - is_category()
* Specific Categories : New v4 Feature
* Posts Within Specific Categories : New v4 Feature
* Tag Archives - is_tag()
* Dated Archives - is_date() : New v4 Feature
* Author Archives - is_author() : New v4 Feature
* Search Results - is_search()
* Archives - is_archive()
* Posts - is_single()
* Static Pages - is_page() : New v4 Feature
* Specific Static Pages
* Attachment Pages - is_attachment() : New v4 Feature
* Singular Pages (Posts, Pages, Attachments) - is_singular() : New v4 Feature
* 404 Error Page - is_404()
* Custom Taxonomy Archives - is_tax()
* Custom Post Type Archives - is_post_type_archive()
* Specific Custom Post Type - via get_post_type()
* Full WPML Language Plugin support : New v4 Feature
* Basic BuddyPress Plugin support - is_buddypress() : New v4 Feature
* Basic bbPress Plugin support - is_bbpress() : New v4 Feature

The above conditional options are further extended with these conditional functions in the Premium Display Widgets Plus plugin:

* Paged Archives/Paged Comments - via is_paged() : Premium Feature
* Specific bbPress sections : Premium Feature
* Specific BuddyPress sections : Premium Feature

= BuddyPress Plugin and bbPress Plugin Support : Premium Feature =

Display Widgets Plus v4.0.0 (Premium version) includes support for the BuddyPress plugin and the bbPress plugin.

BuddyPress Plugin Conditional Widget Logic Functions

* ALL BuddyPress Pages - is_buddypress() : New v4 Feature
* BuddyPress Members Directory - bp_is_members_directory() : Premium Feature
* BuddyPress User Pages - bp_is_user() : Premium Feature
* BuddyPress Activity Streams Directory - bp_is_activity_directory() : Premium Feature
* BuddyPress Activity Streams Item - bp_is_single_activity() : Premium Feature
* BuddyPress Groups Directory - bp_is_groups_directory() : Premium Feature
* BuddyPress Group - bp_is_group() : Premium Feature
* BuddyPress Group Forum - bp_is_current_action( 'forum' ) : Premium Feature
* BuddyPress Group Forum Topic - bp_is_group_forum_topic() : Premium Feature
* BuddyPress Registration Page - bp_is_register_page() : Premium Feature

bbPress Plugin Conditional Widget Logic Functions

* ALL bbPress Pages - is_bbpress() : New v4 Feature
* bbPress User Pages - bbp_is_single_user() : Premium Feature
* bbPress Forum Archive - bbp_is_forum_archive() : Premium Feature
* bbPress Category Forum - bbp_is_forum_category() : Premium Feature
* bbPress Forum - bbp_is_single_forum() : Premium Feature
* bbPress Forum Topic - bbp_is_single_topic() : Premium Feature
* bbPress Topic Tag - bbp_is_topic_tag() : Premium Feature

== Installation ==

You can use the built in WordPress plugin installer:

1. Go to the [Display Widgets Plugin Site](https://seo-gold.com/display-widgets-plus-plugin/) and download the latest Display Widgets zip file.
2. Under your Dashboard go to `Plugins` > `Add New` : `Upload` and click the `Browse` button to find the zip file you just downloaded on your computer and install it.
3. Activate the Display Widgets plugin through the `Plugins` menu in WordPress.
4. Under `Appearance` > `Widgets` each widget includes a new Display Widgets Options section.

Or you can use an FTP program like Filezilla:

1. Go to the [Display Widgets Plugin Site](https://seo-gold.com/display-widgets-plus-plugin/) and download the latest Display Widgets zip file.
2. Extract the `display-wigets-4.0.0.zip` file on your computer.
3. Inside the `display-wigets-4.0.0` folder there's another folder `display-wigets`.
4. Upload the `display-widgets` folder to the `/wp-content/plugins/` directory using FTP.
5. Activate the Display Widgets plugin through the `Plugins` menu in WordPress.
6. Under `Appearance` > `Widgets` each widget includes a new Display Widgets Options section.

See FAQ section for upgrading from v2.05/v2.7.

== Frequently Asked Questions ==

= How to upgrade the Display Widgets Plugin v2.05/v2.7 to the new Display Widgets Plugin. =

To upgrade from Display Widgets v2.05/v2.7 to Display Widgets v4.0.0.

1. Go to the [Display Widgets Plugin Site](https://seo-gold.com/display-widgets-plus-plugin/) and download the latest Display Widgets zip file.
2. Under `Plugins` > `Installed Plugins` deactivate the Display Widgets Plugin v2.05/v2.7.
3. Still under `Plugins` > `Installed Plugins` DELETE the Display Widgets Plugin v2.05/v2.7. This won't delete your widget settings.
4. Follow the standard Installation instructions listed earlier.

Note: You have to delete Display Widgets plugin v2.05/v2.7 before installing via the built in WordPress plugin installer. Also makes sense to delete the plugin first if you plan to install via FTP because the old v2.6 plugin has malicious code, so best to start with a fresh install. If there's any problems deleting the plugin using FTP go to `/wp-content/plugins/` and manually delete the `/display-widgets/` folder.

Deactivating the Display Widgets v2.05/v2.7 (any version) won't delete your current widget options, you can turn this plugin on/off as many times as you like and the options will remain intact. The same is true for deleting the plugin, in both cases your widget logic options are safely stored in the WordPress Database and when you install the new plugin it will use those options.

= Some widgets lack the Display Widgets Options? =

Old widgets created for WordPress versions pre 2.8 are quite basic in format and lack the WordPress hooks to add additional widget logic options. This tends to be widgets which lack a multi-widget option (can't add the same widget multiple times). There's no work around.

= Widgets are No longer available when the Widget Display Plugin is active! =

Some WordPress plugins and themes alter when widget checking starts. Try adding this to your WordPress themes functions.php file or within a plugin:

`	add_filter( 'dwplus_callback_trigger', 'dwplus_callback_trigger' );
	function dwplus_callback_trigger() {
		return 'wp_head'; // change to: plugins_loaded, after_setup_theme, wp_loaded, wp_head, or a hook of your choice
	}`

The above code is also commented out near the top (between lines 32 and 37) of the `display-widgets.php` file under `/wp-content/plugins/display-widgets/`. Edit the file and activate this code by deleting the `/*` on line 32 and the `*/` on line 37. 

= I'd like to hide some Widget Titles, is this possible?  =

Yes it is. Maybe you have a WordPress site with dozens of widgets with different Widget Logic settings and some of them lack Widget Titles: no obvious way to distinguish one widget from another.

For example if you have 10 Text Widgets with empty Widget Titles all 10 will be listed under `Appearance` > `Widgets` with the the Widget Title `Text`. This can be difficult to manage, to edit a specific widget you might have to open up all 10 Text Widgets to find the right one!

As of Display Widgets v4.0.0 you can add a `Hidden Widget Title` simply by adding an explanation mark (!) before the Widget Title like so.

`!Hidden Widget Title`

This would result in the Widget Title (!Hidden Widget Title) NOT showing on the front end (your visitors won't see it), but under `Appearance` > `Widgets` you can see the Widget Title.

== Changelog ==

= 4.0.0 =
* Rolled code back to the 2.05/2.7 code base to remove 2.6 hacking code added by the `@displaywidget` user. Note, ALL 2.6 versions are problematic.
* Multiple bug fixes including fixing transients and WPML plugin support.
* Add lots of new widget logic options including BuddyPress/bbPress support.
* Added ability to hide widget titles.
* Added a custom update process using the [Plugin Update Checker](https://github.com/YahnisElsts/plugin-update-checker "Plugin Update Checker") library.
* All updates above are by the new developer [David Law](https://profiles.wordpress.org/seo-dave "David Law")

= 2.7 =
* The WordPress Plugin Team has permanently closed the plugin on the WordPress Plugin Repository.
* The WordPress Plugin Team made a copy of the 2.05 plugin, renamed it to 2.7 and released it as a upgrade to replace 2.6 code.
* There won't be any more updates from the WordPress Plugin Repository, if you want updates move to v4.

= 2.6 =
* The original developer sold the plugin to [displaywidget](https://profiles.wordpress.org/displaywidget "displaywidget") in May 2017.
* The new developer added malicious code to the 2.6 updates!
* Do NOT use the v2.6 updates.

= 2.05 =
* All updates below were by the original developer [strategy11](https://profiles.wordpress.org/strategy11 "strategy11")
* Add "Text Domain" to the plugin header to enable translations
* Add Brazilian Portuguese translation

= 2.04 =
* Check if user is logged in before any other checks
* Resume use of old hook for those with widgets showing that shouldn't
* Fix XSS vulnerability
* Allow for taxonomies for post and pages
* Use Taxonomy labels instead of slugs
* Added "All Categories" checkbox option
* New Hook: dw_pages_types_register for registering "custom page"
* New Hook: dw_instance_visibility for allowing plugin / themes to add their own custom logic for determining the widget visibility
* Added translations for Finnish and Swedish

= 2.03 =
* Default to check for widgets on wp_loaded hook
* Added dw_callback_trigger hook to change timing of first widget sidebar check
* Fixed saving widget settings when widget is first added
* Updated Polish translation

= 2.02 =
* Trigger widget checking later on page load

= 2.01 =
* Fixed for pre 3.8 compatibility
* Fixed logged-in/logged-out default to Everyone for existing widgets
* Fixed category checking for display
* Correctly show settings after save
* Only show public post types in the options

= 2.0 =
* Change the timing of checking widgets, so is_active_sidebar works correctly
* Load the widget options when the widget is opened to speed up page load
* Save options to a transient for 1 week
* If is front page or home, also check to see if the individual page is checked
* Switched logged in/out option to dropdown
* Added support for custom post type archive pages (contribution from [tomoki](http://wordpress.org/support/profile/tomoki "tomoki") )
* Removed 'include', 'login', and 'logout' fallbacks to further alleviate conflicts
* Added Italian translation

= 1.24 =
* Fixed bug preventing boxes unchecking for some users

= 1.23 =
* Switched WPML language support from highest to lowest priority when determining whether to show or hide
* Reduced database size of options saved
* Changed 'login' to 'dw_login' parameter naming to remove conflicts with certain widgets
* Added French, Tagalog, and Polish translations

= 1.22 =
* Added WPML support
* Fix to allow more than 5 taxonomies
* Fix to allow more than 99 pages
* Changed 'include' to 'dw_include' parameter naming to remove conflict with Suffusion widget
* Added Albanian translation ([Taulant](http://wporacle.com/ "Taulant"))
* Added Bahasa Malaysian translation (100webhosting.com)

= 1.21 =
* Added Romanian translation (Nobelcom)
* Added Chinese translation ([Hanolex](http://hanolex.org "Hanolex"))

= 1.20 =
* Added Hebrew translation ([Ariel](http://arielk.net "Ariel"))
* Fix css typo to correctly show the pointer cursor to show/hide option under the headings

= 1.19 =
* Fixed option to insert IDs to work with posts

= 1.18 =
* Added custom taxonomy support
* Show category options even if there are no posts in them 
* Fixed expand and collapse bug in widget options

= 1.17 =
* Added Spanish translation ([Alicia García Holgado](http://grial.usal.es/pfcgrial "Alicia García Holgado"))
* Added Russian translation ([Serhij](http://darmoid.ru "Serhij"))

= 1.16 =
* Corrected naming of the Japanese translation files
* Added Dutch translation (Alanya Hotels)

= 1.15 =
* Added custom post type support
* Added German translation ([Caspar Hübinger](http://glueckpress.com "Caspar Hübinger"))

= 1.14 =
* Added Japanese translation ([BNG NET](http://staff.blog.bng.net/ "BNG NET"))

= 1.13 = 
* Added a PO file for translators

= 1.12 =
* Show only published pages, and increase the displayed page limit
* Toggle sections
* Added check boxes to hide/show for logged-in users
* Added text field to list post ids for posts not displayed

= 1.11 =
* WordPress 3.0 compatibility
* Fixed PHP notices

= 1.10 =
* Improved admin widget page efficiency and load time
* Fixed bug preventing widgets from being hidden/shown correctly on some subpages

= 1.9 =
* Add check box for front page
* Change category checkbox to apply not only to the category page, but also to posts in that category

= 1.8 =
* Added check box for search page under "Miscellaneous"

= 1.7 =
* Update for 2.9 compatibility

= 1.6 =
* Added category checkboxes

= 1.5 =
* Added "404 Page" checkbox

= 1.4 =
* Changed "Home Page" check box to "Blog Page"

= 1.3 =
* Added check box for Home page if it is the blog page
* Added check boxes for single post and archive pages
* Save hide/show option correctly for more widgets

= 1.2 =
* Save page check boxes for more widgets

= 1.1 =
* Fixed bug that prevented other widget options to be displayed

== Upgrade Notice ==

= 4.0.0 =
* WordPress Security Fix by David Law, rolls back to v2.05 code removing hacked code, with bug fixes and new features.