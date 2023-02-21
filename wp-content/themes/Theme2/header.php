<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name') ?></title>
    <?php wp_head() ?>
</head>
<body>
    <header id="header">
        <div id="judul">
            <h1 id="title"><a href="<?php echo home_url(); ?>"><?php bloginfo('name') ?></a></h1>
            <nav id="menu">
                <?php 
                    wp_nav_menu($args);
                    $args = array('theme_location' => 'main_menu');
                ?>
            </nav>
        </div>
        <div id="title-description">
            <h3><?php bloginfo('description'); ?></h3>
        </div>
    </header>
    