<?php 
    //Load Script
    function load_file(){
        wp_enqueue_style('style', get_stylesheet_uri());
    }
    add_action('wp_enqueue_scripts', 'load_file');

    //Menu
    register_nav_menu(
        'main_menu', __('Menu Utama', 'theme-slug')
    );
?> 

<?php 
    function get_excerpt_length(){
        return 5;
    }
    function return_excerpt_text(){
        return '';
    }

    add_filter('excerpt_more', 'return_excerpt_text');
    add_filter('excerpt_length', 'get_excerpt_length');
?>

<?php add_action('login_head', function() { ?>

        <style>
            body{
                background-color: blue;
            }
            #login h1{
                display: none;
            }
        </style>

<?php }); ?>