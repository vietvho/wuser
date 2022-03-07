<?php 
if( ! class_exists('Wuser') ) :

Class Wuser{

    /**
	 * __construct
	 *
	 * a dummy construct prepare for extend
	 *
	 * @date	3/3/2022
	 * @since	1.0
	 *
	 * @param	void
	 * @return	void
	 */	
	function __construct() {
		
	}

	/**
	 * wuser_enqueuescripts
	 *
	 * Enqueue scripts and style
	 *
	 * @date	3/3/2022
	 * @since	1.0
	 * @return	void
	 */
	function wuser_enqueuescripts(){
		wp_enqueue_script( 'wuser_script', WUSER_URL.'/build/index.js', array( 'wp-element' ), '1.0', true );
		wp_enqueue_style( 'wuser_style', WUSER_URL.'/build/main.scss.css', '', '1.0' );
		wp_localize_script( 'wuser_script', 'wajax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	}

    /**
	 * initialize
	 *
	 * Sets up the Wuser plugin.
	 *
	 * @date	3/3/2022
	 * @since	1.0
	 *
	 * @param	void
	 * @return	void
	 */
	function initialize() {
       
        require_once WUSER_PATH ."/inc/router.php";
        
        if (class_exists('Wrouter')) {
            $wrouter = new Wrouter;
            $wrouter -> register_routers(['wu ser'=>  WUSER_PATH. 'templates/wuser.php','wuser'=>  WUSER_PATH. 'templates/wuser.php']);
        }

		add_action( 'wp_enqueue_scripts', [__CLASS__,'wuser_enqueuescripts'] );

		require_once WUSER_PATH ."/inc/wuser-data.php";
        if (class_exists('WuserData')) {
            $userData = new WuserData();
            $userData -> init();
        }
    }
   
}

endif;