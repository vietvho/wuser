<?php 
class WuserData {
    /**
     * init
     *
     * do register WuserData
     *
     * @date	3/1/22
     * @since	1.0
     *
     * @return	void
     */
    function init() {
        add_action( 'wp_ajax_get_user_list', [__CLASS__,'w_get_user_list'] );
        add_action( 'wp_ajax_nopriv_get_user_list', [__CLASS__,'w_get_user_list'] );
        add_action( 'wp_ajax_get_user_details', [__CLASS__,'w_get_user_details'] );
        add_action( 'wp_ajax_nopriv_get_user_details', [__CLASS__,'w_get_user_details'] );
    }

    /**
     * w_get_user_list
     * 
     * do  getUserList
     *
     * @date	3/1/22
     * @since	1.0
     *
     * @return	json
     */
    function w_get_user_list() {
        $curl = curl_init( 'https://jsonplaceholder.typicode.com/users' );
        ob_start();
        $response = curl_exec( $curl );
        curl_close( $curl );
        $response =  ob_get_clean();

        if (isset($_POST['action']) && $_POST['action'] === 'get_user_list') {
            echo $response;
            die();
        }

        // for test purpose
        return $response ;
    }

    /**
     * w_get_user_details
     * 
     * do  getUserDetails
     *
     * @date	3/1/22
     * @since	1.0
     *
     * @return	json
     */
    function w_get_user_details() {
        if (!isset($_POST['userID'])) {
            $response =  json_encode(['error' => __("user not Found","wuser")]);
        } 
        else {
            $curl = curl_init( 'https://jsonplaceholder.typicode.com/users/'.$_POST['userID'] );
            ob_start();
            curl_exec( $curl );
            curl_close( $curl );
            $response =  ob_get_clean();
            $objRes = json_decode($response);

            if (!isset($objRes->id)) {
                $response =  json_encode(['error' => __("user not Found","wuser")]);
            }
        }

        if (isset($_POST['action']) && $_POST['action']=== 'get_user_details'){
            echo $response;
            die();
        }

        //test purpose
        return $response;
    }
}
?>