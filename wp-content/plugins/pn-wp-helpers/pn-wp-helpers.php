<?php
/**
 * PlusNarrative WP Helpers.
 *
 * @category Class
 * @package  PN_WP_Helpers
 * @author   Jethro May <jethro@plusnarrative.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://plusnarrative.com/
 */

/**
    Plugin Name: PlusNarrative WP Helpers
    Description: Additional helpers for WordPress.
    Version: 1.2
    Author: PlusNarrative
    Author URI: https://www.plusnarrative.com/
    Copyright: PlusNarrative
    Text Domain: pn
    Domain Path: /lang
 */

if(!defined('ABSPATH')) :
    exit;
endif;

if(!class_exists('PN_WP_Helpers')) :

    /**
     * Main plugin class.
     *
     * @category Class
     * @package  PN_WP_Helpers
     * @author   Jethro May <jethro@plusnarrative.com>
     * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
     * @link     https://plusnarrative.com/
     */
    class PN_WP_Helpers
    {
        var $version = '1.2';
        var $settings = array();

        /**
         * PN_WP_Helpers constructor.
         */
        function __construct()
        {
            /* Do nothing here */
        }

        /**
         * Setup the initial plugin settings.
         *
         * @return void
         */
        function initialize()
        {
            $version = $this->version;
            $basename = plugin_basename(__FILE__);
            $path = plugin_dir_path(__FILE__);
            $url = plugin_dir_url(__FILE__);
            $slug = dirname($basename);

            // Various settings for the plugin.
            $this->settings = array(
                'name'                  => __('PlusNarrative WP Helpers', 'pn'),
                'version'               => $version,
                'file'                  => __FILE__,
                'basename'              => $basename,
                'path'                  => $path,
                'url'                   => $url,
                'slug'                  => $slug,
                'show_admin'            => true,
                'show_updates'          => true,
                'stripslashes'          => false,
                'capability'            => 'manage_options',
                'uploader'              => 'wp',
                'autoload'              => false,
                'remove_wp_meta_box'    => true
            );

            // Constants
            define('PN',             true);
            define('PN_VERSION',     $version);
            define('PN_PATH',        $path);

            // Classes
            include_once PN_PATH . 'classes/inflect.php';
            include_once PN_PATH . 'classes/parsedown.php';

            // Helpers
            include_once PN_PATH . 'includes/helpers.php';

            // Updates
            include_once PN_PATH . 'includes/updates.php';

            // Include functions.
            Pn_include('includes/pn-wp-helper-functions.php');

            // Include walkers.
            Pn_include('includes/walkers/class-wp-bootstrap-walker.php');

            // Include forms.
            Pn_include('includes/forms/validation-helpers.php');

            // Include components.
            Pn_include('includes/components/component-helpers.php');

            // Include cpt/taxonomy helpers.
            Pn_include('includes/cpt/cpt.php');

            if(is_admin()) {
                new BitbucketUpdater(__FILE__, 'plusnarrativeteam/pn-wp-helpers-plugin', 'jethro_pn', 'B83QKFKXaR6BpRDRP6QU');
            }

            // Fire init method.
            add_action('init',    array($this, 'init'), 5);
        }

        /**
         * Run plugin initialization.
         *
         * @return void
         */
        function init()
        {
            // Check if hook has not been fired.
            if(!did_action('plugins_loaded') ) :
                return;
            endif;

            // Set version of the plugin.
            $version = (int) $this->version;

            do_action('pn/init');
        }
    }

    /**
     * Used to return the PlusNarrative WP Helpers instance.
     *
     * @return PN_WP_Helpers
     */
    function PN_WP_helpers()
    {
        // Globals
        global $pn_wp_helpers;

        // Initialize
        if(!isset($pn_wp_helpers) ) :
            $pn_wp_helpers = new PN_WP_Helpers();
            $pn_wp_helpers->initialize();
        endif;

        // Return.
        return $pn_wp_helpers;
    }

    // Initialize.
    PN_WP_helpers();

endif; // class_exists check.
