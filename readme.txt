=== UCF People CPT Plugin ===
Contributors: ucfwebcom
Tags: ucf, people, person, custom post type
Requires at least: 4.7.3
Tested up to: 6.1
Stable tag: 1.1.1
License: GPLv3 or later
License URI: http://www.gnu.org/copyleft/gpl-3.0.html

Provides a custom post type for describing people and a taxonomy for people groups.


== Description ==

Provides a custom post type for describing people and a taxonomy for people groups.

NOTE: This plugin assumes that People posts will primarily be displayed on other pages and posts using shortcodes, such as the [UCF Post List shortcode](https://github.com/UCF/UCF-Post-List-Shortcode), or explicitly listed in custom theme templates.  The Person custom post type does _not_ automatically generate archives by default.  If you'd like archives to be generated for the Person post type on your site, you can override this setting within your theme's functions.php file like so:

```
function mysite_person_post_type_args( $args ) {
	$args['has_archive'] = true;
	return $args;
}

add_filter( 'ucf_people_post_type_args', 'mysite_person_post_type_args', 10, 1 );
```

If you add this snippet to your theme, you'll need to flush permalink settings for the changes to take effect (Setting > Permalinks; click "Save Changes"--you don't have to adjust any settings).


== Installation ==

= Manual Installation =
1. Upload the plugin files (unzipped) to the `/wp-content/plugins` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the "Plugins" screen in WordPress]

= WP CLI Installation =
1. `$ wp plugin install --activate https://github.com/UCF/UCF-People-CPT/archive/master.zip`.  See [WP-CLI Docs](http://wp-cli.org/commands/plugin/install/) for more command options.


== Changelog ==

= 1.1.1 =
Enhancements:
 * Added composer file.

= 1.1.0 =
Enhancements:
* Added REST endpoint support for Person post type.

= 1.0.3 =
* Auto-generated archives for the Person post type have been disabled.  **You should flush permalinks on your site after upgrading to v1.0.3; see [upgrade notices below](#upgrade-notice)**

= 1.0.2 =
* Added header for GitHub Updater support.

= 1.0.1 =
* Cleaned up some php warnings related to empty $meta object.

= 1.0.0 =
* Initial release


== Upgrade Notice ==

= 1.0.3 =
Upon upgrading to version 1.0.3, you should flush your site's permalink settings manually (Setting > Permalinks; click "Save Changes"--you don't have to adjust any settings).


== Installation Requirements ==

None


== Development & Contributing ==

NOTE: this plugin's readme.md file is automatically generated.  Please only make modifications to the readme.txt file, and make sure the `gulp readme` command has been run before committing readme changes.
