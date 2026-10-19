<?php
/**
 * Remove updater cache when the plugin is deleted.
 *
 * @package Builder_Meta_Cleanup
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_site_option( 'builder_meta_cleanup_github_release' );
delete_site_transient( 'builder_meta_cleanup_gh_release' );
delete_site_transient( 'builder_meta_cleanup_wporg_plugin' );

$builder_meta_cleanup_delete_source = static function () {
	delete_option( 'builder_meta_cleanup_update_source' );
};

if ( is_multisite() ) {
	$builder_meta_cleanup_sites = get_sites(
		array(
			'fields' => 'ids',
			'number' => 0,
		)
	);
	foreach ( $builder_meta_cleanup_sites as $builder_meta_cleanup_site_id ) {
		switch_to_blog( (int) $builder_meta_cleanup_site_id );
		$builder_meta_cleanup_delete_source();
		restore_current_blog();
	}
} else {
	$builder_meta_cleanup_delete_source();
}
