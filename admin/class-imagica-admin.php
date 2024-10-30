<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Imagica
 * @subpackage Imagica/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Imagica
 * @subpackage Imagica/admin
 * @author     Your Name <email@example.com>
 */
class Imagica_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $imagica    The ID of this plugin.
	 */
	private $imagica;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $imagica       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $imagica, $version ) {

		$this->imagica = $imagica;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Imagica_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Imagica_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$screen = get_current_screen();

		$arrayAllowLoadCss = ['imagica_page_show-imagica-settings','toplevel_page_imagica'];
        if(isset($screen->base) && in_array($screen->base,$arrayAllowLoadCss)){
	        wp_enqueue_style( $this->imagica, plugin_dir_url( __FILE__ ) . 'css/imagica-admin.css', array(), $this->version, 'all' );
        }

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Imagica_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Imagica_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->imagica, plugin_dir_url( __FILE__ ) . 'js/imagica-admin.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Register menu admin.
	 *
	 * @since    1.0.0
	 */
	public function register_menu_admin() {
		add_menu_page(
			__('Imagica','imagica'),
			__('Imagica','imagica'),
			'upload_files',
			'imagica',
			['Imagica_Admin','show_imagica_studio'],
			plugins_url( 'imagica/admin/img/imagica.svg' ),
			10
		);

		// Adicione as páginas subordinadas
		add_submenu_page(
			'imagica',
			__('Settings Imagica','imagica'),
			__('Settings','imagica'),
			'upload_files',
			'show-imagica-settings',
			['Imagica_Admin','show_imagica_settings']
		);
	}

	public static function show_imagica_settings(){
		$classDataEncription = new Imagica_Encryption();


		if(isset($_GET['err'])) $messageFailure = sanitize_text_field($_GET['err']);


		if ( isset( $_POST['imagica_token'] ) && !preg_match('/[*]{3,}/', $_POST['imagica_token'])) {
			$imagica_token = sanitize_text_field($_POST['imagica_token']);
			// save token
			//i8mDCxRKHYHsOO1bV50PpKTzSPbkEqyyChwmJ2w8
			$isvalid = self::imagica_check_if_token_is_valid($imagica_token);
			if (is_bool($isvalid) and $isvalid){
				$classDataEncription = new Imagica_Encryption();
				update_option( 'imagica_token', $classDataEncription->encrypt($imagica_token) );
				$messageSucess=__('Token saved with sucess','imagica');
			}elseif(is_bool($isvalid)){
				$messageFailure=__('Token is invalid','imagica');
			}else{
				$messageFailure=$isvalid;
			}
		} else if(isset( $_POST['imagica_token'] ) && preg_match('/[*]{3,}/', $_POST['imagica_token'])) {
			$messageFailure=__('Token is invalid','imagica');
		}

        include_once "partials/imagica-admin-display.php";
	}

	function my_page_template_redirect() {

		if(isset($_GET['page']) ) {

			$page = sanitize_text_field($_GET['page']);
			if($_GET['page'] != 'show-imagica-settings' && $_GET['page'] == 'imagica'){


				$classDataEncription = new Imagica_Encryption();

				$token = $classDataEncription->decrypt(get_option( 'imagica_token' ));

				$response = wp_remote_post( 'https://app.imagica.online/api/v1/users/token-is-valid', array(
					'method'      => 'POST',
					'timeout'     => 45,
					'redirection' => 5,
					'httpversion' => '1.1',
					'blocking'    => true,
					'headers'     => array('Accept'=>'application/json', 'Accept-Language' => get_bloginfo("language"),'Authorization'=>'Bearer '.$token),
					)
				);

				if(empty(get_option('imagica_token')) || $response['response']['code'] !== 200) {
					wp_redirect("./admin.php?page=show-imagica-settings&err=".__('Oops something went wrong, looks like you are not authenticated.', 'imagica'));
	                exit();
				}
			}
			
		}
	}

	public static function show_imagica_studio(){

		$messageFailure = '';

		$post_nonce = wp_create_nonce("imagica_add_prompty_nonce");
		
		$creditsResponse = Self::get_imagica_credits();
		
		$credits = '';

		if($creditsResponse['response']['code'] === 200) {

			if($creditsResponse['body']) {

				if(isset((json_decode(sanitize_text_field($creditsResponse['body']), true))['credits'])) {

					$credits = json_decode(sanitize_text_field($creditsResponse['body']), true)['credits'];
				} else { 

					wp_die( 'Invalid data' );
				}
			} else {
				wp_die( 'Invalid data' );
			}
		} else { $messageFailure = sanitize_text_field($creditsResponse['body']); }

		if(isset($_POST['step']) && (sanitize_text_field($_POST['step'])) == 2) {

			if(empty($_POST['prompt'])) {

				wp_die( 'Invalid data' );
			}

			if(empty($_POST['style_id'])) {

				wp_die( 'Invalid data' );
			}

			$prompt = sanitize_text_field($_POST['prompt']);
			$style_id = sanitize_text_field($_POST['style_id']);

			$imagesResponse = Self::new_imagica_image($prompt,$style_id);

			if(isset($imagesResponse['response']) && isset($imagesResponse['response']['code']) && $imagesResponse['response']['code'] != 200) {

				$messageFailure = !empty($imagesResponse['body']) ? sanitize_text_field(json_decode($imagesResponse['body'])->error) : '';
			}

			if(empty($messageFailure)){

				if(!isset($imagesResponse['body'])) wp_die( 'Invalid data' );
	
				if(!isset(json_decode($imagesResponse['body'], true)['images'])) wp_die( 'Invalid data' );
	
				$images = json_decode($imagesResponse['body'], true)['images'];
	
				foreach ($images as $key => $image) {
	
					if(!isset($image['id'])) wp_die( 'Invalid data' );
					if(!isset($image['image_url'])) wp_die( 'Invalid data' );
	
					$images[$key]['id'] = sanitize_text_field($image['id']);
					$images[$key]['image_url'] = sanitize_url($image['image_url']);
				}

				return include_once "partials/imagica-admin-gallery.php";
			}
		}

		if(isset($_POST['step']) && (sanitize_text_field($_POST['step'])) == 3) {

			if(empty($_POST['prompt'])) {

				wp_die( 'Invalid data' );
			}

			$prompt = sanitize_text_field($_POST['prompt']);


			if(!isset($_POST['images'])) wp_die('Invalid data');



			if(!is_array($_POST['images']) || count($_POST['images']) == 0) wp_die('Invalid data');

			if(count($_POST['images'])>0) {

				$error = array();
				$images = array();
				$imagesCompressed = array();

				foreach ($_POST['images'] as $key => $url) {
					
					array_push($images, sanitize_url($url));
				}

				$imagesResponses = Self::compress_images($images);

				foreach ($imagesResponses as $key => $response) {

					if($response['response']['code'] != 200 && $response['response']['code'] != 201 ) {

						array_push($error, ['code' => sanitize_text_field($response['response']['code']), 'message' =>  sanitize_text_field($response['body'])]);
					} else {

						array_push($imagesCompressed, sanitize_url(json_decode($response['body'], true)['url']));
					}
				}

				if(empty($error)) {
					
					Self::save_in_media_images($imagesCompressed, $prompt);
					
					$list_artist = self::get_imagica_list();

					$messageSuccess = __('Images successfully saved', 'imagica');

					return include_once "partials/imagica-admin-studio.php";
				}
			}

			$messageFailure = $error;

			return include_once "partials/imagica-admin-gallery.php";
		}

		$list_artist = self::get_imagica_list();
		
		include_once "partials/imagica-admin-studio.php";
	}

	public static function compress_images($images){

		$imagesCompressed = [];

		foreach ($images as $image) {
			
			$response = wp_remote_post('http://api.pixifyer.com/download/convert/JPEG', array(
				'method'      => 'POST',
				'timeout'     => 60,
				'body' => json_encode([ "url" => $image ]),
				'headers' => array(
					'Content-Type'=>'application/json',
					'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0',
					'token' => 'eyJhbGciOiJIUzI1NiJ9.eyJSb2xlIjoiQWRtaW4iLCJJc3N1ZXIiOiJJc3N1ZXIiLCJVc2VybmFtZSI6IkphdmFJblVzZSIsImV4cCI6MTY3MDg0OTQwMiwiaWF0IjoxNjcwODQ5NDAyfQ.CjOiQVjr7o9mWinzjxDK4i4TuY50Yh2ZeJqODSI4rkk'
			)));

			array_push($imagesCompressed, $response);
		}

		return $imagesCompressed;
	}

	public static function checkBackImagesIsSelected($image) {

		$selected = false;

		if(sanitize_text_field($_POST['step']) == 3) {

			foreach (sanitize_text_field($_POST['images']) as $key => $image_selected) {
			
				if($image_selected === $image['image_url']) $selected = true;
			}
		}

		return $selected;
	}

	public static function save_in_media_images($images, $prompt) {

		foreach ($images as $key => $image_url) {
				
			$image_url = str_replace(' ', '%20', $image_url);

			$image_url = sanitize_url($image_url);

			$image_filename = basename(parse_url( $image_url, PHP_URL_PATH ));

			$tmpfname = wp_tempnam($image_filename);

			if (!$tmpfname){

				return new WP_Error('http_no_file', __('Could not create Temporary file.'));
			}

			$args = apply_filters('imagica_remote_get_args', array( 'timeout' => 20, 'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0', 'stream' => true, 'filename' => $tmpfname ));

			wp_safe_remote_get( $image_url, $args);

			$file_array['tmp_name'] = $tmpfname;

			$file_array['name'] = sanitize_title($prompt).".jpeg";

			$time = current_time( 'mysql' );

			$overrides = array( 'test_form' => false );

			$file = wp_handle_sideload( $file_array, $overrides, $time);

			if ( isset( $file['error'] ) ) {
				return new WP_Error( 'upload_error', $file['error'] );
			}

			$url     = $file['url'];
			$type    = $file['type'];
			$file    = $file['file'];
			$title   = preg_replace( '/\.[^.]+$/', '', wp_basename( $file ) );
			$content = sanitize_textarea_field($prompt);

			$attachment = array_merge(
				array(
					'post_mime_type' => $type,
					'guid'           => $url,
					'post_parent'    => 0,
					'post_title'     => $title,
					'post_content'   => $content,
				),
				[]
			);

			$attachment_id = wp_insert_attachment( $attachment, $file, 0, true );

			if ( ! is_wp_error( $attachment_id ) ) {
				wp_update_attachment_metadata( $attachment_id, wp_generate_attachment_metadata( $attachment_id, $file ) );
			}

			add_post_meta($attachment_id, '_lh_copy_from_url-original_file', $image_url, true);
			update_post_meta($attachment_id, '_wp_attachment_image_alt', $prompt);
		}
	}



	public static function new_imagica_image($prompt,$style_id) {

		$classDataEncription = new Imagica_Encryption();


		$response = wp_remote_post( 'https://app.imagica.online/api/v1/prompts/store', array(
			'method'      => 'POST',
			'timeout'     => 45,
			'redirection' => 5,
			'httpversion' => '1.1',
			'blocking'    => true,
			'body'        => json_encode(array(
				'prompt' => $prompt,
				'style_id' => (int)$style_id
			)),
			'headers'     => array('Content-Type'=>'application/json','Accept'=>'application/json', 'Accept-Language' => get_bloginfo("language"),'Authorization'=>'Bearer '.$classDataEncription->decrypt(get_option( 'imagica_token' ))),
		));

		return $response;
	}

	public static function get_imagica_credits() {

		$classDataEncription = new Imagica_Encryption();

		$response = wp_remote_post( 'https://app.imagica.online/api/v1/users/credits', array(
			'method'      => 'GET',
			'timeout'     => 45,
			'redirection' => 5,
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => array('Accept'=>'application/json', 'Accept-Language' => get_bloginfo("language"),'Authorization'=>'Bearer '.$classDataEncription->decrypt(get_option( 'imagica_token' ))),
		));

		return $response;
	}

	public static function get_imagica_list(){

		$classDataEncription = new Imagica_Encryption();

		$response = wp_remote_post( 'https://app.imagica.online/api/v1/styles', array(
			'method'      => 'GET',
			'timeout'     => 45,
			'redirection' => 5,
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => array('Accept'=>'application/json',  'Accept-Language' => get_bloginfo("language"),'Authorization'=>'Bearer '.$classDataEncription->decrypt(get_option( 'imagica_token' ))),
		));
		
		if($response['response']['code'] != 200) return $response;

		if(!isset($response['body'])) wp_die( 'Invalid data' );

		if(!isset(json_decode($response['body'], true)['images'])) wp_die( 'Invalid data' );

		$images = json_decode($response['body'], true)['images'];

		foreach ($images as $key => $image) {

			if(!isset($image['id'])) wp_die( 'Invalid data' );
			if(!isset($image['image_url'])) wp_die( 'Invalid data' );
			if(!isset($image['style'])) wp_die( 'Invalid data' );

			$images[$key]['id'] = sanitize_text_field($image['id']);
			$images[$key]['image_url'] = sanitize_url($image['image_url']);
			$images[$key]['style'] = sanitize_text_field($image['style']);
		}

		return $images;
	}


    public static function imagica_check_if_token_is_valid($token){

	    $response = wp_remote_post( 'https://app.imagica.online/api/v1/users/token-is-valid', array(
			    'method'      => 'POST',
			    'timeout'     => 45,
			    'redirection' => 5,
			    'httpversion' => '1.1',
			    'blocking'    => true,
			    'headers'     => array('Accept'=>'application/json', 'Accept-Language' => get_bloginfo("language"),'Authorization'=>'Bearer '.$token),
		    )
	    );

	    if ( is_wp_error( $response ) ) {
		    $error_message = $response->get_error_message();
		    return $error_message;
	    } else {

			if(!isset($response['response'])) wp_die('Invalid data');

			if(!isset($response['response']['code'])) wp_die('Invalid data');

			if($response["response"]["code"] != 200) {

				return sanitize_text_field($response["response"]["message"]) . " - " . sanitize_text_field($response["response"]["code"]);
			}

			if(isset($response['body'])){
				$objreturn = json_decode(sanitize_text_field($response['body']));

				if(isset($objreturn->success) and $objreturn->success==true){
					return true;
				}elseif(isset($objreturn->message) and $objreturn->message=='Unauthenticated.'){
					return false;
				}else{
					return $objreturn;
				}
			}else{
				return $response;
			}
	    }
    }




}
