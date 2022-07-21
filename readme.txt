=== Pantheon Environment Admin Bar ===
Contributors: tripflex
Donate link: https://plugins.smyl.es
Tags: pantheon, environment, env, adminbar, live, dev, test, multidev, lando
Requires at least: 5.1
Tested up to: 5.6
Requires PHP: 5.2
Stable tag: 1.0
Author URI: https://smyl.es
Plugin URI: https://github.com/tripflex/pantheon-env-admin-bar
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Color specific admin bar visual representation of the current Pantheon Environment

== Description ==
Specifically for Pantheon hosting environment (requires Pantheon to work).

Sometimes when you have 50 different browser windows open, you may lose track of which environment the open page is from.

While yes, you can just look at the URL bar, this plugin adds a very basic visual representation in the admin bar, of which Pantheon environment you're currently on.

Value is based on `$_ENV['PANTHEON_ENVIRONMENT']`

== Installation ==
1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==

1. Live Environment
2. Test Environment
3. Dev Environment
4. Multidev Environment (will show multidev name)
5. Lando (same color as dev)

== Changelog ==

= 1.0 = February 2, 2021
* Initial Release

== Contributing ==
https://github.com/tripflex/pantheon-env-admin-bar