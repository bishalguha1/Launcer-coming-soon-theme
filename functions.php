<?php 

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

function launcer_bootstraping(){
    load_theme_textdomain('launcer');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'launcer_bootstraping');

function launcer_assets(){
    wp_enqueue_style('main-css' , get_stylesheet_uri());
    wp_enqueue_style('animate-css' , get_theme_file_uri('/assets/css/animate.css'));
    wp_enqueue_style('icomoon-css' , get_theme_file_uri('/assets/css/icomoon.css'));
    wp_enqueue_style('bootstrap-css' , get_theme_file_uri('/assets/css/bootstrap.css'));
    wp_enqueue_style('theme-css' , get_theme_file_uri('/assets/css/style.css'));
    // wp_enqueue_style('fontawesome' , '//fonts.googleapis.com/css?family=Open+Sans:400,700,800');

    wp_enqueue_script('easy-js', get_theme_file_uri('/assets/js/jquery.easing.1.3.js') , array('jquery') , _S_VERSION , null);
    wp_enqueue_script('bootstrap-js', get_theme_file_uri('/assets/js/bootstrap.min.js') , array('jquery') , _S_VERSION , null);
    wp_enqueue_script('waypoint-js', get_theme_file_uri('/assets/js/jquery.waypoints.min.js') , array('jquery') , _S_VERSION , null);
    wp_enqueue_script('countdown-js', get_theme_file_uri('/assets/js/simplyCountdown.js') , array('jquery') , _S_VERSION , null);
    wp_enqueue_script('main-js', get_theme_file_uri('/assets/js/main.js') , array('jquery') , _S_VERSION , null);
}
add_action('wp_enqueue_scripts' , 'launcer_assets');


// Widget registration
function launcer_widgets(){
    register_sidebar(array(
        'name'          => __( 'Footer left', 'launcer' ),
        'id'            => 'footer-left',
        'description'   => __( 'This sidebar is for footer left', 'launcer' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __( 'Footer right', 'launcer' ),
        'id'            => 'footer-right',
        'description'   => __( 'This sidebar is for footer right', 'launcer' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));
}

add_action('widgets_init' , 'launcer_widgets');


function launcer_css_head(){
    if(is_page()):
        $aside_thumbnail = get_the_post_thumbnail_url(null, 'full');
    ?>
        <style>
            .aside-bg{
                background-image: url(<?php echo $aside_thumbnail; ?>);
            }
        </style>
    <?php
    endif;
}

add_action('wp_head', 'launcer_css_head');

add_filter('acf/settings/remove_wp_meta_box', '__return_false');







?>

