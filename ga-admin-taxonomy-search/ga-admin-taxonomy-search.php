<?php
/*
Plugin Name:    GA Admin Taxonomy Search
Version:    0.0.4
Tags: wordpress admin taxonomy search, category search, taxonomy search, search in category, categories search, category filter, filter categories, categories filter, admin filter, taxonomy filter, term filter, terms filter, admin search terms, admin search taxonomy plugin, taxonomy filter plugin, term filter plugin, category filter plugin
Plugin URI: https://grigorasatryan.com/
Description:    GA Admin Taxonomy Search is a WordPress plugin for searching/filtering items in the category/term meta box. It works for every category and custom taxonomy and is compatible with Gutenberg.
Author: Grigor Asatryan
Author URI: https://grigorasatryan.com/
Requires at least: 3.6
Tested up to: 6.7.0
Requires PHP: 5.4
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

// Our prefixes are GATS / gats

define( 'GATSVersion', '0.0.4' );
define( 'GATS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'GATS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'GATS_PROTECTION_H', plugin_basename(__FILE__) );
define( 'GATS_NAME', 'ga-admin-tax-search' );

define( 'GATS_PAGE_LINK', 'ga-admin-tax-search' );

if( !function_exists('gats_print') ){
    function gats_print( $array ) {
        echo '<pre>'; print_r( $array ); echo '</pre>';
    }
}

require_once( GATS_PLUGIN_DIR . 'lib/class.gats.php' );

add_action( 'init', array( 'GATS', 'init' ) );

if ( is_admin() ) {
    require_once( GATS_PLUGIN_DIR . 'lib/class.gats-admin.php' );
    add_action( 'init', array( 'GATS_Admin', 'init' ) );
}
register_activation_hook( __FILE__, array( 'GATS', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'GATS', 'plugin_deactivation' ) );
