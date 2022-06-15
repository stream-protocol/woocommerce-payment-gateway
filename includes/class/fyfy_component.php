<?php

// Prohibit direct script loading.
defined( 'ABSPATH' ) || die( 'No direct script access allowed!' );


/**
 * FyFy core component
 * @ver 1.0
 */


class stream_component{

    /**
     * The single instance of the class.
     *
     * @var STREAM component
     * @since  1.0
     */
    private static $instance;

    /**
     * FyFy version.
     *
     * @var string
     */

    public $version = '1.0.0';

    /**
     * Component Hooks
     *
     * @since 1.0.0
     * @var array
     */
    protected $page_hooks = array();

    /**
     * Component action.
     *
     * @since 1.0.0
     * @var array
     */
    protected $view_actions = array();

    /**
     * Instance of FyFy Component View template rendered.
     *
     * @since 1.0.0
     * @var FyFy
     */
    protected $view;


    public function __construct()
    {

    }

    /**
     * Load a file with require_once(), after running it through a filter.
     *
     * @since 1.0.0
     *
     * @param string $file   Name of the PHP file with the class.
     * @param string $folder Name of the folder with $class's $file.
     */
    public static function load_file( $file, $folder, $args = [] ) {
        $full_path = STREAM_PLUGIN_DIR .'/includes/'.$folder . '/' . $file;
        /**
         * Filter the full path of a file that shall be loaded.
         *
         * @since 1.0.0
         *
         * @param string $full_path Full path of the file that shall be loaded.
         * @param string $file      File name of the file that shall be loaded.
         * @param string $folder    Folder name of the file that shall be loaded.
         */
        extract($args);
        $full_path = apply_filters( 'stream_load_file_full_path', $full_path, $file, $folder );
        if ( $full_path ) {
            require_once $full_path;
        }
    }

    /**
     * Create a new instance of the $class, which is stored in $file in the $folder subfolder
     * of the plugin's directory.
     *
     * @since 1.0.0
     *
     * @param string $class  Name of the class.
     * @param string $file   Name of the PHP file with the class.
     * @param string $folder Name of the folder with $class's $file.
     * @param mixed  $params Optional. Parameters that are passed to the constructor of $class.
     * @return object Initialized instance of the class.
     */
    public static function load_class( $class, $file, $folder, $params = null ) {
        /**
         * Filter name of the class that shall be loaded.
         *
         * @since 1.0.0
         *
         * @param string $class Name of the class that shall be loaded.
         */
        $class = apply_filters( 'stream_load_class_name', $class );
        if ( ! class_exists( $class, false ) ) {
            self::load_file( $file, $folder );
        }
        $the_class = new $class( $params );
        return $the_class;
    }


}
