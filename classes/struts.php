<?php

class Struts {
	static protected $_config = NULL;

	static public function load_config( array $config ) {
		self::$_config = $config;
	}

	static public function config( $name ) {
		return self::$_config[$name];
	}
}

function struts_autoloader( $class ) {
	$filename = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . strtolower( str_replace( '_', DIRECTORY_SEPARATOR, $class ) . '.php' );

	if ( file_exists( $filename ) ) {
		require_once $filename;
	}
}

spl_autoload_register( 'struts_autoloader' );

// By default, check for a config file located at the root of Struts (typically struts/config.php)
$config_filename = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config.php';

if ( file_exists( config_filename ) ) {
	Struts::load_config( $config_filename );
}