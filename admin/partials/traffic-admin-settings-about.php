<?php
/**
 * Provide a admin-facing view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @package    Plugin
 * @author  Pierre Lannoy <https://pierre.lannoy.fr/>.
 * @since   1.0.0
 */

use Traffic\System\Environment;

$warning = '';
if ( Environment::is_plugin_in_dev_mode() ) {
	$warning = '<p>⚠️&nbsp;' . sprintf( esc_html__( 'This version of %s is not production-ready. It is a development preview. Use it at your own risk!', 'traffic' ), TRAFFIC_PRODUCT_NAME ) . '</p>';
}
if ( Environment::is_plugin_in_rc_mode() ) {
	$warning = '<p>⚠️&nbsp;' . sprintf( esc_html__( 'This version of %s is a release candidate. Although ready for production, this version is not officially supported in production environments.', 'traffic' ), TRAFFIC_PRODUCT_NAME ) . '</p>';
}

$intro      = sprintf( esc_html__( '%1$s is a free and open source plugin for WordPress. It integrates other free and open source works (as-is or modified) like: %2$s.', 'traffic' ), '<em>' . TRAFFIC_PRODUCT_NAME . '</em>', do_shortcode( '[traffic-libraries]' ) );
$trademarks = esc_html__( 'All brands, icons and graphic illustrations are registered trademarks of their respective owners.', 'traffic' );

?>
<h2><?php echo esc_html( TRAFFIC_PRODUCT_NAME . ' ' . TRAFFIC_VERSION ); ?></h2>
<?php echo $warning; ?>
<p><?php echo $intro; ?></p>
<h4><?php esc_html_e( 'Disclaimer', 'traffic' ); ?></h4>
<p><em><?php echo esc_html( $trademarks ); ?></em></p>
<hr/>
<h2><?php esc_html_e( 'Changelog', 'traffic' ); ?></h2>
<?php echo do_shortcode( '[traffic-changelog]' ); ?>
