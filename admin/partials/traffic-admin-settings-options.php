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

?>

<form action="
	<?php
		echo esc_url(
			add_query_arg(
				[
					'page'   => 'traffic-settings',
					'action' => 'do-save',
					'tab'    => 'misc',
				],
				admin_url( 'options-general.php' )
			)
		);
		?>
	" method="POST">
	<?php /*do_settings_sections( 'traffic_loggers_options_section' ); ?>
	<?php do_settings_sections( 'traffic_plugin_options_section' );*/ ?>
	<?php wp_nonce_field( 'traffic-plugin-options' ); ?>
	<p><?php echo get_submit_button( esc_html__( 'Reset to Defaults', 'traffic' ), 'secondary', 'reset-to-defaults', false ); ?>&nbsp;&nbsp;&nbsp;<?php echo get_submit_button( null, 'primary', 'submit', false ); ?></p>
</form>
