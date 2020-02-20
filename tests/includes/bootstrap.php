<?php
// Set timezone to prevent warnings
if ( ! defined( 'BASE_DIR' ) ) {
	define( 'BASE_DIR', realpath( __DIR__ . '/../..' ) );
}

define( 'WP_TESTS_DIR', BASE_DIR . '/vendor/wordpress/wordpress/tests/phpunit/' );
define( 'ABSPATH', BASE_DIR . '/vendor/wordpress/phpunit/src/' );

$table_prefix = 'wptests_';

// Create the WP Test suite config
$config_file = "<?php
		@define( ABSPATH, '" . ABSPATH . "'  );
		@define( 'WP_TESTS_MULTISITE', true );
		@define( 'WP_DEBUG', true );
		@define( 'DB_NAME', '" . DB_NAME . "' );
		@define( 'DB_USER', '" . DB_USER . "' );
		@define( 'DB_PASSWORD', '" . DB_PASSWORD . "' );
		@define( 'DB_HOST', '" . DB_HOST . "' );
		@define( 'DB_CHARSET', 'utf8' );
		@define( 'DB_COLLATE', '' );
		\$table_prefix  = 'wptests_';
		@define( 'WP_TESTS_DOMAIN', '" . WP_TESTS_DOMAIN . "' );
		@define( 'WP_TESTS_EMAIL', 'admin@example.org' );
		@define( 'WP_TESTS_TITLE', 'Test Blog' );
		@define( 'WP_PHP_BINARY', 'php' );
		@define( 'WP_DEFAULT_THEME', 'default' );
";

var_dump( WP_TESTS_DIR . 'wp-tests-config.php' );

file_put_contents( WP_TESTS_DIR . 'wp-tests-config.php', $config_file );



// Include the WP test suite functions
require_once WP_TESTS_DIR . 'includes/functions.php';

// Setup WordPress environment
require WP_TESTS_DIR . 'includes/bootstrap.php';
