<?php
//fouten zichtbaar maken, staat standaard uit voor veiligheid
ini_set('error_reporting',E_ALL);
ini_set('display_errors','On');

//hook name, naam van de functie
add_action( 'wp_enqueue_scripts', 'ld_enqueue_styles' );
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

//functie
function ld_enqueue_styles() { //naam functie moet identiek zijn aan add_action (lijn erboven)
    //"hang" mijn eigen style in de wachtrij & voeg hem toe aan de header
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style( 'child-style',
                         get_stylesheet_directory_uri() . '/screen.css',
                         array( 'parent-style' ),
                         wp_get_theme()->get('Version') );
   
}
function load_my_script(){
    wp_register_script( 
        'resizer', 
        get_stylesheet_directory_uri() . '/js/resizeNav.js', 
        array( 'jquery' )
    );
    wp_enqueue_script( 'resizer' );
}
add_action('wp_enqueue_scripts', 'load_my_script');
add_action( 'after_setup_theme', 'cl_remove_featured_images_from_child_theme', 11 ); 

function cl_remove_featured_images_from_child_theme() {

    // This will remove support for post thumbnails on ALL Post Types
   // remove_theme_support( 'post-thumbnails' );

    // Add this line in to re-enable support for just Posts
    add_theme_support( 'custom-background', array( 'post' ) );
}



if ( ! function_exists('cl_kampen') ) {

    // Register Custom Post Type
    function cl_kampen() {
    
        $labels = array(
            'name'                  => _x( 'Kampen', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Kampen', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'Kampen', 'text_domain' ),
            'name_admin_bar'        => __( 'Kampen', 'text_domain' ),
            'archives'              => __( 'Kampen archief', 'text_domain' ),
            'attributes'            => __( 'Kampen attribuut', 'text_domain' ),
            'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
            'all_items'             => __( 'All Items', 'text_domain' ),
            'add_new_item'          => __( 'Voeg nieuwe kampen toe', 'text_domain' ),
            'add_new'               => __( 'Nieuwe Kampen', 'text_domain' ),
            'new_item'              => __( 'Nieuwe Kampen', 'text_domain' ),
            'edit_item'             => __( 'Wijzig Kampen', 'text_domain' ),
            'update_item'           => __( 'Update Kampen', 'text_domain' ),
            'view_item'             => __( 'Toon Kampen', 'text_domain' ),
            'view_items'            => __( 'Toon Kampen', 'text_domain' ),
            'search_items'          => __( 'Doorzoek Kampen', 'text_domain' ),
            'not_found'             => __( 'Not found', 'text_domain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
            'featured_image'        => __( 'Featured Image', 'text_domain' ),
            'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
            'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
            'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
            'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
            'items_list'            => __( 'Kampen Lijst', 'text_domain' ),
            'items_list_navigation' => __( 'Kampen lijst navigatie', 'text_domain' ),
            'filter_items_list'     => __( 'Filter Kampen lijst', 'text_domain' ),
        );
        $args = array(
            'label'                 => __( 'Kampen', 'text_domain' ),
            'description'           => __( 'De verschillende kampen', 'text_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-admin-home',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type( 'Kampen', $args );
    
    }
    add_action( 'init', 'cl_kampen', 0 );
    }

    if ( ! function_exists('cl_begeleiders') ) {

        // Register Custom Post Type
        function cl_begeleiders() {
        
            $labels = array(
                'name'                  => 'Begeleiders',
                'singular_name'         => 'Begeleider',
                'menu_name'             => 'Begeleider',
                'name_admin_bar'        => 'Begeleider',
                'archives'              => 'Begeleiders archief',
                'attributes'            => 'Begeleiders attributen',
                'parent_item_colon'     => 'Parent Item:',
                'all_items'             => 'All Items',
                'add_new_item'          => 'Add New Item',
                'add_new'               => 'Nieuwe begeleider',
                'new_item'              => 'Nieuwe begeleider',
                'edit_item'             => 'Wijzig begeleider',
                'update_item'           => 'Update begeleider',
                'view_item'             => 'Toon begeleider',
                'view_items'            => 'Toon begeleider',
                'search_items'          => 'Doorzoek begeleider',
                'not_found'             => 'Not found',
                'not_found_in_trash'    => 'Not found in Trash',
                'featured_image'        => 'Featured Image',
                'set_featured_image'    => 'Set featured image',
                'remove_featured_image' => 'Remove featured image',
                'use_featured_image'    => 'Use as featured image',
                'insert_into_item'      => 'Insert into item',
                'uploaded_to_this_item' => 'Uploaded to this item',
                'items_list'            => 'Begeleiders lijst',
                'items_list_navigation' => 'Begeleiders lijst navigation',
                'filter_items_list'     => 'Filter begeleiders lijst',
            );
            $args = array(
                'label'                 => 'Begeleider',
                'description'           => 'Begeleiders',
                'labels'                => $labels,
                'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-admin-users',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'page',
                'show_in_rest'          => true,
            );
            register_post_type( 'begeleiders', $args );
            }
            add_action( 'init', 'cl_begeleiders', 0 );
        }

    function cl_add_custom_box()
        {
            

            add_meta_box(
                'cl_kampen_box1_id',           // Unique ID
                'Begeleider #1',  // Box title
                'cl_custom_box_kampen_begeleider1_html',  // Content callback, must be of type callable
                'kampen'                  // Post type
            );

            add_meta_box(
                'cl_kampen_box2_id',           // Unique ID
                'Begeleider #2',  // Box title
                'cl_custom_box_kampen_begeleider2_html',  // Content callback, must be of type callable
                'kampen'                  // Post type
            );

            add_meta_box(
                'cl_kok_box_id',           // Unique ID
                'Kok #1',  // Box title
                'cl_custom_box_kok_html',  // Content callback, must be of type callable
                'kampen'                  // Post type
            );
            
            add_meta_box(
                'cl_persoonlijk_box_id',           // Unique ID
                'Persoonlijke info',  // Box title
                'cl_custom_box_begeleider_tel_html',  // Content callback, must be of type callable
                'begeleiders'                  // Post type
            );

            
        }

        function get_all_of_post_type( $type_name = '') {
            $items = array();
            if ( !empty( $type_name ) ) {
                $args = array(
                    'post_type' => "{$type_name}",
                    'posts_per_page' => -1,
                    'order' => 'DESC',
                    'orderby' => 'begeleiders'
                );
                $results = get_posts( $args );        
            }
            return $results;
        }

        function cl_custom_box_kampen_begeleider1_html($post){
            
            $value_gekoppelde_begeleider_id = get_post_meta($post -> ID, '_kampen_begeleider1', true);
            $begeleiders = get_all_of_post_type('begeleiders');

            foreach($begeleiders as $begeleider){
                if($begeleider->_is_profiel == 1){
                       print_r("<input type='radio' name='kampen_begeleider1' value='" . $begeleider->ID . "' " . 
                      ($begeleider->ID == $value_gekoppelde_begeleider_id ? "checked": "") . ">". $begeleider->post_title ."</input><br/>");
                }
                
            }
        }

        function cl_custom_box_kampen_begeleider2_html($post){
            
            $value_gekoppelde_begeleider_id = get_post_meta($post -> ID, '_kampen_begeleider2', true);
            $begeleiders = get_all_of_post_type('begeleiders');

            foreach($begeleiders as $begeleider){
                if($begeleider->_is_profiel == 1){
                       print_r("<input type='radio' name='kampen_begeleider2' value='" . $begeleider->ID . "' " . 
                      ($begeleider->ID == $value_gekoppelde_begeleider_id ? "checked": "") . ">". $begeleider->post_title ."</input><br/>");
                }
                
            }
        }

        function cl_custom_box_kok_html($post){
            $value_gekoppelde_begeleider_id = get_post_meta($post -> ID, '_kampen_kok', true);
            $begeleiders = get_all_of_post_type('begeleiders');

            foreach($begeleiders as $begeleider){
                if($begeleider->_is_profiel == 2){
                    print_r("<input type='radio' name='kampen_kok' value='" . $begeleider->ID . "' " . 
                   ($begeleider->ID == $value_gekoppelde_begeleider_id ? "checked": "") . ">". $begeleider->post_title ."</input><br/>");
             }
                
            }
        }

        function cl_custom_box_begeleider_tel_html($post){
            $value_profiel = get_post_meta($post->ID, '_is_profiel', true);
            $value_gender = get_post_meta($post->ID, '_is_gender', true);
            $value_geboortedatum = get_post_meta($post->ID, '_is_geboortdatum', true);
            $value_telefoonnummer = get_post_meta($post->ID, '_is_tel', true);
            $value_emailadres = get_post_meta($post->ID, '_is_email', true);
            

            print("Profiel<br>
            <select name='is_profiel' id='profiel' value='".$value_profiel."'>
            <option value='1' ".($value_profiel == 1 ? " selected" : ""). ">Begeleider</option>
            <option value='2' ".($value_profiel == 2 ? " selected" : ""). ">Kok</option>
            </select>");

            print("<br>Geslacht<br>
            <select name='is_gender' id='slaapkamer' value='".$value_gender."'>
            <option value='1' ".($value_gender == 1 ? " selected" : ""). ">man</option>
            <option value='2' ".($value_gender == 2 ? " selected" : ""). ">vrouw</option>
            </select>");
             
            print('<br/>
            <label for="is_geboortdatum">Geboortedatum</label>
            <input type="date" name="is_geboortdatum" class="form-control" id="is_geboortdatum" value="'. $value_geboortedatum .'">
            <br/>
            <label for="is_tel">Telefoonnummer</label>
            <input type="text" name="is_tel" class="form-control" id="is_tel" value="'. $value_telefoonnummer .'" placeholder="Telefoonnummer">
            <br/>
            <label for="telefoonnummer">Email</label><br/>
            <input type="email" name="is_email" class="form-control" id="is_email" value="'. $value_emailadres .'" placeholder="name@example.com">
            
            ');
        }


        function cl_save_postdata($post_id){
            //bepaal het (custom type)
                $naam_post_type = get_post_type($post_id);
                if ($naam_post_type){
                    //het gaat om een Custom post type want er bestaat een post_type (het is niet leeg)
                    if ($naam_post_type == "begeleiders"){
                        if (array_key_exists('is_profiel', $_POST)) {
                            update_post_meta(
                                $post_id,
                                '_is_profiel',
                                $_POST['is_profiel']
                            );
                        }
                        if (array_key_exists('is_tel', $_POST)) {
                            update_post_meta(
                                $post_id,
                                '_is_tel',
                                $_POST['is_tel']
                            );
                        }
                        if (array_key_exists('is_gender', $_POST)) {
                            update_post_meta(
                                $post_id,
                                '_is_gender',
                                $_POST['is_gender']
                            );
                        }if (array_key_exists('is_geboortdatum', $_POST)) {
                            update_post_meta(
                                $post_id,
                                '_is_geboortdatum',
                                $_POST['is_geboortdatum']
                            );
                        }if (array_key_exists('is_email', $_POST)) {
                            update_post_meta(
                                $post_id,
                                '_is_email',
                                $_POST['is_email']
                            );
                        }
                        
                    }if ($naam_post_type == "kampen"){
                        if(array_key_exists('kampen_begeleider1', $_POST)){
                                update_post_meta(
                                $post_id,
                                '_kampen_begeleider1',
                                $_POST['kampen_begeleider1']
                            );
                        }
                        if(array_key_exists('kampen_begeleider2', $_POST)){
                                update_post_meta(
                                $post_id,
                                '_kampen_begeleider2',
                                $_POST['kampen_begeleider2']
                            );
                        }
                        if(array_key_exists('kampen_kok', $_POST)){
                                update_post_meta(
                                $post_id,
                                '_kampen_kok',
                                $_POST['kampen_kok']
                            );
                        }
                    
                    }
                }    
            }



       
        add_action('add_meta_boxes', 'cl_add_custom_box');
        add_action('save_post', 'cl_save_postdata');
?>