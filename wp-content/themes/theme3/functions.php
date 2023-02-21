<?php
    //Load Script (CSS)

    function load_file(){
        wp_enqueue_style('style', get_stylesheet_uri());
    }
    add_action('wp_enqueue_scripts', 'load_file');
?>

<?php 
    //Excerpt Content

    function get_excerpt_length(){
        return 5;
    }
    function return_excerpt_text(){
        return '';
    }

    add_filter('excerpt_more', 'return_excerpt_text');
    add_filter('excerpt_length', 'get_excerpt_length');
?>


<?php 
    //Background & Logo Halaman Login

    function my_login_logo() { ?>
        <style>
            .login {
                background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/DSC_0511.JPG);   
                background-size:  100% 100%;
                }
            #login h1 a, .login h1 a {
                background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/site-login-logo.PNG);
                height:65px;
                width:320px;
                background-size: 30% 100%;
                background-repeat: no-repeat;
                padding-bottom: 30px;
                } 
        </style>            
    <?php } ?>
<?php add_action( 'login_enqueue_scripts', 'my_login_logo' );?>


<?php 
    function init_setup() {
        //Add Menu
        register_nav_menu(
            'main_menu', __('Menu Utama', 'theme-slug')
        );

        //Add featured image
        add_theme_support('post-thumbnails');
        add_image_size('small-thumb', 200, 200, true);

        //Add Post Format
        add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'));
    }

    add_action('after_setup_theme', 'init_setup' );
?>


<?php
    //Add Widgets

    function widget_setup(){
        register_sidebar(array(
            'name' => "Sidebar Pertama",
            'id' => "sidebar1"
        ));
        register_sidebar(array(
            'name' => "Sidebar Kedua",
            'id' => "sidebar2"
        ));
    }
    add_action('widgets_init','widget_setup')
?>


<?php 
    //Remove Meta-Box

    function wpdocs_remove_dashboard_widgets(){
        //remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   //Right Now /
        //remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); //Recent Comments
        //remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  //Incoming Links
        //remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   //Plugins
        //remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  //Quick Press /
        remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');  //Recent Drafts
        remove_meta_box('dashboard_primary', 'dashboard', 'side');   //WordPress blog /
        //remove_meta_box('dashboard_secondary', 'dashboard', 'side');   //Other WordPress News
        remove_meta_box('dashboard_site_health', 'dashboard', 'normal'); //Site Health /
        //remove_meta_box('dashboard_activity', 'dashboard', 'normal'); //Activity /
        //use 'dashboard-network' as the second parameter to remove widgets from a network dashboard.
    }

    add_action('wp_dashboard_setup', 'wpdocs_remove_dashboard_widgets');
?>

<?php 
    function custom_post() {

        //Custom Post News
        register_post_type('news',
            array(
                'labels'      => array(
                    'name'          => __('News', 'news'),
                    'singular_name' => __('News', 'news_update'),
                    'add_new_item'  => __('Add New News'),
                    'edit_item'     => __('Edit News'),
                    'all_items'      => __('All News')
                ),
                    'public'      => true,
                    'has_archive' => true,
                    'rewrite'     => array( 'slug' => 'news' ), // my custom slug
                    'show_in_admin_bar' => true,
            )
        );


        //Theme Support
        add_post_type_support( 'news', array(
            'title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields','post-formats',
        ) );


        //Taxonomy "Topik"
        $labels = array(
            'name'              => _x( 'Topik', 'taxonomy general name', 'textdomain' ),
            'singular_name'     => _x( 'Topik', 'taxonomy singular name', 'textdomain' ),
            'search_items'      => __( 'Search Topik', 'textdomain' ),
            'all_items'         => __( 'All Topik', 'textdomain' ),
            'parent_item'       => __( 'Parent Topik', 'textdomain' ),
            'parent_item_colon' => __( 'Parent Topik:', 'textdomain' ),
            'edit_item'         => __( 'Edit Topik', 'textdomain' ),
            'update_item'       => __( 'Update Topik', 'textdomain' ),
            'add_new_item'      => __( 'Add New Topik', 'textdomain' ),
            'new_item_name'     => __( 'New Topik Name', 'textdomain' ),
            'menu_name'         => __( 'Topik', 'textdomain' ),
        );
        $args = array(
            'labels' => $labels,
            'description' => __( '', 'textdomain' ),
            'hierarchical' => true,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'show_in_quick_edit' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
        );
        register_taxonomy( 'Topik', array('news'), $args );
    }
    
    add_action('init', 'custom_post');
?>