<?php
class Ithemes_Sync_Verb_Backupbuddy_Get_Overview extends Ithemes_Sync_Verb {
	public static $name = 'backupbuddy-get-overview';
	public static $description = 'Get overview and status information.';
	
	private $default_arguments = array(
	);
	
	/*
	 * Return:
	 *		array(
	 *			'success'	=>	'0' | '1'
	 *			'status'	=>	'Status message.'
	 *			'overview'	=>	[array of overview information]
	 *		)
	 *
	 */
	public function run( $arguments ) {
		
		$arguments = Ithemes_Sync_Functions::merge_defaults( $arguments, $this->default_arguments );
		
		if ( ! class_exists( 'backupbuddy_core' ) ) {
			require_once( pb_backupbuddy::plugin_path() . '/classes/core.php' );
		}
		
		
		$overview = array(
			'backupbuddyVersion'		=> pb_backupbuddy::settings( 'version' ),
			'localTime'					=> time(),
			'lastBackupStart'			=> pb_backupbuddy::$options['last_backup_start'],
			'lastBackupSerial'			=> pb_backupbuddy::$options['last_backup_serial'],
			'lastBackupStats'			=> pb_backupbuddy::$options['last_backup_stats'],
			'editsSinceLastBackup'		=> pb_backupbuddy::$options['edits_since_last'],
			'scheduleCount'				=> count( pb_backupbuddy::$options['schedules'] ),
			'profileCount'				=> count( pb_backupbuddy::$options['profiles'] ),
			'destinationCount'			=> count( pb_backupbuddy::$options['remote_destinations'] ),
			'notifications'				=> array(), // Array of string notification messages.
		);
		
		
		return array(
			'version' => '4',
			'status' => 'ok',
			'message' => 'Overview retrieved successfully.',
			'overview' => $overview,
		);
		
	} // End run().
	
	
} // End class.
