<?php 
class Wrouter{

    /**
    * register_routers
    *
    * prepare for register routers
    *
    * @date	3/1/22
    * @since	1.0
    * @param	array $router([slug => path,slug => path]) slug: string, path: string
    * @return	void
    */
    function register_routers($routers) {
        global $wrouter;
        $wrouter = $this->createSlug($routers);
        $this->init();
    }

    /**
    * createSlug
    *
    * create Slug from string
    *
    * @date	3/1/22
    * @since	1.0
    * @param	array $router($slug=>$path)
    * @return	array converted to slug
    */
    static function createSlug( $routers){
        $output = [];

        foreach($routers as $slug => $path) {
            $delimiter = '-';
            $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $slug))))), $delimiter));
            $output[$slug] = $path;
        }

        return $output;
    } 

    /**
     * init
     *
     * do register routers
     *
     * @date	3/1/22
     * @since	1.0
     *
     * @return	void
     */
    
    function init() {
        add_filter( 'template_include', [__CLASS__,'wuser_register_template']);
    }

    /**
     * wuser_modify_404_page_title
     *
     * Render Page Title for custom Slug
     *
     * @date	3/1/22
     * @since	1.0
     * @param	string $title_parts 
     * @return	string Title return
     */
    function wuser_modify_404_page_title( $title_parts ) {
        if ( is_404() ) {
            $title_parts['title'] = __('User List','wuser');
        }
        return $title_parts;
    }

    /**
     * wuser_register_template
     *
     * Defines register router path
     *
     * @date	3/1/22
     * @since	1.0
     *
     * @param	string $name The constant name.
     * @param	mixed $value The constant value.
     * @return	void
     */

    function wuser_register_template( $original_template ) {
        global $wp;
        global $wrouter;
        
        $request = explode( '/', $wp->request );
        $current_request = current($request);
        
        if (isset($wrouter[$current_request])) {
            add_filter( 'document_title_parts', [__CLASS__,'wuser_modify_404_page_title'] );
            add_filter('redirect_canonical','__return_false');
            return  $wrouter[$current_request];
        }
        return $original_template;
    }

}


?>