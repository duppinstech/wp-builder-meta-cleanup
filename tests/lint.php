<?php
/**
 * Run php -l on PHP files in this plugin.
 *
 * @package Builder_Meta_Cleanup
 */

$root = dirname( __DIR__ );
$fail = 0;

$iterator = new RecursiveIteratorIterator(
	new RecursiveDirectoryIterator( $root, FilesystemIterator::SKIP_DOTS )
);

foreach ( $iterator as $file ) {
	if ( ! $file->isFile() || 'php' !== $file->getExtension() ) {
		continue;
	}

	$path = $file->getPathname();
	if ( preg_match( '#[\\\\/](\.git|vendor|node_modules)[\\\\/]#', $path ) ) {
		continue;
	}

	$command = escapeshellarg( PHP_BINARY ) . ' -l ' . escapeshellarg( $path );
	$output  = array();
	$code    = 0;
	exec( $command, $output, $code );
	echo implode( PHP_EOL, $output ) . PHP_EOL;

	if ( 0 !== $code ) {
		$fail++;
	}
}

exit( $fail > 0 ? 1 : 0 );
