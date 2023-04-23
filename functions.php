<?php

// Admin Bar
add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );

//Add support for post thumbnails
add_theme_support('post-thumbnails');

//Add custom image size
add_image_size('custom-thumbnail', 500, 500);
add_image_size('custom-large', 1200, 800);
add_image_size('custom-full', 1920, 1080);

// Enqueue Scripts Styles
function ruthcare23_enqueue_scripts_styles()
{
  wp_enqueue_script('jquery-js', 'https://code.jquery.com/jquery-3.6.3.min.js', array(), false);
  wp_enqueue_script('ruthcare23-js', get_template_directory_uri() . '/src/js/main.js', array(), '1.0.0', false);
  wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js', array(), false);
  wp_enqueue_script('owlcarousel-js', get_template_directory_uri() . '/src/lib/owlcarousel/js/owl.carousel.min.js', array(), '1.0.0', false);
  wp_enqueue_script('fontawesome-js', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js', array(), false);

  // Remove Gutenburg styles
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');
  wp_dequeue_style('wc-blocks-style');

  wp_enqueue_style('ruthcare23-css', get_template_directory_uri() . '/src/css/main.css', array(), '1.0.0');
  wp_enqueue_style( 'google-poppins-font-css', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap', array(), false ); 
  wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css', array(), false );
  wp_enqueue_style( 'owlcarousel-css', get_template_directory_uri() . '/src/lib/owlcarousel/css/owl.carousel.min.css', array(), '1.0.0'); 
  wp_enqueue_style( 'owlcarousel-css-default', get_template_directory_uri() . '/src/lib/owlcarousel/css/owl.theme.default.min.css', array(), '1.0.0'); 
  wp_enqueue_style( 'fontawesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css', array(), false); 

  wp_localize_script( 'ruthcare23-js', 'ruthcare23', array('ajaxurl' => admin_url( 'admin-ajax.php' )));
}
add_action('wp_enqueue_scripts', 'ruthcare23_enqueue_scripts_styles');

//Defer scripts for site
function ruthcare23_defer_scripts($tag, $handle, $src) {
    if('owlcarousel-js' !== $handle):
        return $tag;
    else:
      return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>';
    endif;
}
add_filter('script_loader_tag', 'ruthcare23_defer_scripts', 10, 3);

function ruthcare23_ajax_contact_init(){

  add_action( 'wp_ajax_nopriv_contact', 'ruthcare23_ajax_contact' );
  add_action( 'wp_ajax_contact', 'ruthcare23_ajax_contact' );
  
}
add_action('init', 'ruthcare23_ajax_contact_init');

//Register both Header and Footer nav menus for the site
if (!function_exists('ruthcare23_register_nav_menu')):

	function ruthcare23_register_nav_menu(){
		register_nav_menus( array(
	    	'main_menu' => __( 'Main Menu', 'text_domain' ),
	    	'footer_menu'  => __( 'Footer Menu', 'text_domain' ),
		) );
	}
	add_action('after_setup_theme', 'ruthcare23_register_nav_menu', 0);

endif;

//Unregsiter tags from defualt post type
function ruthcare23_unregister_post_tags() {
  unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'ruthcare23_unregister_post_tags');


//Remove default category metabox within posts and Articles post type
function ruthcare23_remove_category_metabox() { 

   remove_meta_box('categorydiv' , 'post' , 'normal'); 
   remove_meta_box('topicsdiv' , 'article' , 'normal'); 

} 
add_action('admin_menu', 'ruthcare23_remove_category_metabox');

//remove default post type
function ruthcare23_remove_default_post_type() {
   remove_menu_page('edit.php');
}
add_action('admin_menu', 'ruthcare23_remove_default_post_type');

//Register custom post type of volunteers for the site
function ruthcare23_register_volunteers_post_type() {
    $labels = array(
        'name'                  => _x( 'Volunteers', 'Post type general name', 'ruthcare23' ),
        'singular_name'         => _x( 'Volunteer', 'Post type singular name', 'ruthcare23' ),
        'menu_name'             => _x( 'Volunteers', 'Admin Menu text', 'ruthcare23' ),
        'name_admin_bar'        => _x( 'Volunteer', 'Add New on Toolbar', 'ruthcare23' ),
        'add_new'               => __( 'Add New', 'ruthcare23' ),
        'add_new_item'          => __( 'Add New Volunteer', 'ruthcare23' ),
        'new_item'              => __( 'New Volunteer', 'ruthcare23' ),
        'edit_item'             => __( 'Edit Volunteer', 'ruthcare23' ),
        'view_item'             => __( 'View Volunteer', 'ruthcare23' ),
        'all_items'             => __( 'All Volunteers', 'ruthcare23' ),
        'search_items'          => __( 'Search Volunteers', 'ruthcare23' ),
        'parent_item_colon'     => __( 'Parent Volunteers:', 'ruthcare23' ),
        'not_found'             => __( 'No Volunteers found.', 'ruthcare23' ),
        'not_found_in_trash'    => __( 'No Volunteers found in Trash.', 'ruthcare23' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'volunteer custom post type.',
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'volunteer' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-admin-users',
        'supports'           => array( 'title', 'thumbnail' ),
        'show_in_rest'       => false,
    );
     
    register_post_type( 'volunteer', $args );
}
add_action( 'init', 'ruthcare23_register_volunteers_post_type' );

//Register custom topics taxonomy
function ruthcare23_add_custom_taxonomies() {
    $labels = array(
      'name' => _x( 'Topics', 'taxonomy general name' ),
      'singular_name' => _x( 'Topic', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Topics' ),
      'all_items' => __( 'All Topics' ),
      'parent_item' => __( 'Parent Topic' ),
      'parent_item_colon' => __( 'Parent Topic:' ),
      'edit_item' => __( 'Edit Topic' ),
      'update_item' => __( 'Update Topic' ),
      'add_new_item' => __( 'Add New Topic' ),
      'new_item_name' => __( 'New Topic Name' ),
      'menu_name' => __( 'Topics' ),
    );

    register_taxonomy('topics', array('article'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => false,
    'show_admin_column' => true,
    'query_var' => false,
    'rewrite' => array( 'slug' => 'topic' ),
  ));

}
add_action('init', 'ruthcare23_add_custom_taxonomies', 0);

//Register custom post type of articles for the site
function ruthcare23_register_articles_post_type() {
    $labels = array(
        'name'                  => _x( 'Articles', 'Post type general name', 'ruthcare23' ),
        'singular_name'         => _x( 'Article', 'Post type singular name', 'ruthcare23' ),
        'menu_name'             => _x( 'Articles', 'Admin Menu text', 'ruthcare23' ),
        'name_admin_bar'        => _x( 'Article', 'Add New on Toolbar', 'ruthcare23' ),
        'add_new'               => __( 'Add New', 'ruthcare23' ),
        'add_new_item'          => __( 'Add New Article', 'ruthcare23' ),
        'new_item'              => __( 'New Article', 'ruthcare23' ),
        'edit_item'             => __( 'Edit Article', 'ruthcare23' ),
        'view_item'             => __( 'View Article', 'ruthcare23' ),
        'all_items'             => __( 'All Articles', 'ruthcare23' ),
        'search_items'          => __( 'Search Articles', 'ruthcare23' ),
        'parent_item_colon'     => __( 'Parent Articles:', 'ruthcare23' ),
        'not_found'             => __( 'No Articles found.', 'ruthcare23' ),
        'not_found_in_trash'    => __( 'No Articles found in Trash.', 'ruthcare23' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'article custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'blog', 'with_front' => false ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-media-text',
        'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        'show_in_rest'       => false,
        'taxonomies'         => array('topic'),
    );
     
    register_post_type( 'article', $args );
}
add_action( 'init', 'ruthcare23_register_articles_post_type' );


//Function to limit excerpt for posts
function excerpt($limit, $post_id = NULL) {
    $excerpt = explode(' ', get_the_excerpt($post_id), $limit);
    if (count($excerpt)>=$limit):
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    else:
        $excerpt = implode(" ",$excerpt);
    endif;      
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    
    return $excerpt;
}

// Register contact form function to handle AJAX request.
function ruthcare23_ajax_contact() {
 
  $messages = array();
  $errors = false;
  $status = false;

  if ($_SERVER['REQUEST_METHOD'] == 'POST'):

    if (!check_ajax_referer( 'ruthcare23-contact-nonce', 'contact-security', false )):
      $messages[] = array(
        'type' => 'danger',
        'message' => 'There was an issue with the form. Please try again later!'
      );
      
      $errors = true;
      
    endif;

    if (empty($_POST['name'])):
      $messages[] = array(
        'type' => 'warning',
        'message' => 'Please provide your full name.'
      );
      
      $errors = true;
    endif;

    if(empty($_POST['email'])):
       $messages[] = array(
        'type' => 'warning',
        'message' => 'Please provide an email address.'
      );
      
      $errors = true;
    endif;

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)):
      $messages[] = array(
        'type' => 'warning',
        'message' => 'The email address you have provided appears to be invalid. Please double check it.'
      );
      
      $errors = true;
    endif;

    if (empty($_POST['subject'])):
      $messages[] = array(
        'type' => 'warning',
        'message' => 'Please select a subject.'
      );
      
      $errors = true;
    endif;

    if (empty($_POST['message'])):
      $messages[] = array(
        'type' => 'warning',
        'message' => 'Please enter a message.'
      );
      
      $errors = true;
    endif;

    if (!$errors):
      $to      = get_bloginfo('admin_email');
      $subject = get_bloginfo('name') . ' Site Contact Form Request';
      $body    = 'From: ' . $_POST['name'] . '<br>';
      $body .= 'Email: ' . $_POST['email'] . '<br>';
      $body .= 'Subject: ' . $_POST['subject'] . '<br>';
      $body .= 'Message: ' . $_POST['message'] . '<br>';
      $headers = array('Content-Type: text/html; charset=UTF-8');
      wp_mail($to, $subject, $body, $headers);

      $messages[] = array(
        'type' => 'success',
        'message' => 'Thank you for the form submission.'
      );

      $status = true;
   
    endif;

    $response = array(
      'status' => $status,
      'messages' => $messages
    );
    
    echo json_encode($response);

    die();
    
  endif;

}

?>