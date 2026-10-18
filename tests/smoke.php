<?php
/**
 * Plugin header smoke test. Does not load WordPress.
 *
 * @package Builder_Meta_Cleanup
 */

$main = dirname( __DIR__ ) . '/builder-meta-cleanup.php';

if ( ! is_file( $main ) ) {
	fwrite( STDERR, "Missing builder-meta-cleanup.php\n" );
	exit( 1 );
}

$src = file_get_contents( $main );

$checks = array(
	'Plugin Name'       => '/Plugin Name:\s*Builder Meta Cleanup/',
	'Requires at least' => '/Requires at least:\s*6\.0/',
	'Requires PHP'      => '/Requires PHP:\s*7\.4/',
	'Text Domain'       => '/Text Domain:\s*builder-meta-cleanup/',
	'License'           => '/License:\s*GPL-2\.0-or-later/',
);

foreach ( $checks as $label => $pattern ) {
	if ( ! preg_match( $pattern, $src ) ) {
		fwrite( STDERR, "Plugin header missing: {$label}\n" );
		exit( 1 );
	}
}

echo "ok\n";
exit( 0 );
