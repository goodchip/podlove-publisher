<?php
namespace Podlove\Modules\Migration;
use \Podlove\Model;

class Migration extends \Podlove\Modules\Base {

		protected $module_name = 'Migration';
		protected $module_description = 'Helps you migrate from PodPress/PowerPress/... to Podlove.';

		public function load() {
			add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_styles' ) );
			add_action( 'admin_menu', array( $this, 'register_menu' ), 20 );
		}

		public function register_admin_styles() {
			if ( isset( $_REQUEST['page'] ) && $_REQUEST['page'] === 'podlove_settings_migration_handle' ) {
				wp_register_style( 'twitter-bootstrap-style', $this->get_module_url() . '/css/bootstrap.min.css' );
				wp_enqueue_style( 'twitter-bootstrap-style' );
			}
		}

		public function register_menu() {
			new Settings\Assistant( \Podlove\Podcast_Post_Type::SETTINGS_PAGE_HANDLE );
		}
}
