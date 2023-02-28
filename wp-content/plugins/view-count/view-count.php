<?php
/*
*Plugin Name: Plugin View Count
*Version: 1.0
*Plugin URI: #
*Author: Arun
*Author URI: #
*Description: Plugin view count
*/
?>

<?php
    //Menu & Sub Menu

    function view(){
        add_menu_page('Plugin View Count','View Count','manage_options','plugin-dua','view_menu','dashicons-admin-network','90');
        add_submenu_page('plugin-dua','Setting','Setting','manage_options','menu-setting','menu2','');
    }

    function view_menu(){
        echo '<h1>Selamat Datang di Plugin View Count saya</h1>';
    }

    function menu2(){
        echo '<h2>Ini Sub Menu Setting</h2>';
    }

    add_action('admin_menu','view');


?>