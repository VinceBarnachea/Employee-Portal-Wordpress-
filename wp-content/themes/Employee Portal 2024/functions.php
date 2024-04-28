<?php
// This function enqueues the Normalize.css for use. The first parameter is a name for the stylesheet, the second is the URL. Here we
// use an online version of the css file.
function add_normalize_CSS() {
   wp_enqueue_style( 'normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
}

add_action('wp_enqueue_scripts', 'add_normalize_CSS');



// Register a new sidebar simply named 'sidebar'
function add_widget_support() {
    register_sidebar( array(
                    'name'          => 'Sidebar',
                    'id'            => 'sidebar',
                    'before_widget' => '<div>',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h2>',
                    'after_title'   => '</h2>',
    ) );
}
// Hook the widget initiation and run our function
add_action( 'widgets_init', 'add_widget_support' );

 // Register a new navigation menu
 function add_Main_Nav() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
  }
  // Hook to the init action hook, run our navigation menu function
  add_action( 'init', 'add_Main_Nav' );


function start_session() {
    if (!session_id()) {
        session_start();
    }
}
add_action('init', 'start_session', 1);



function add_style_scripts(){
	wp_enqueue_script('my-script', get_template_directory_uri() . '/js/script.js');

    // wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/ajax/ajax-script.js' );

    // wp_localize_script( 'ajax-script', 'my_ajax_object',
    // array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action('wp_enqueue_scripts', 'add_style_scripts');