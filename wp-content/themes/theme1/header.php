<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name') ?></title>
    <? wp_head() ?>
</head>
<body>
    <header>
        <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name') ?></a></h1>
        <nav>
            <?php 
                wp_nav_menu($args);
                $args = array('theme_location' => 'main_menu');
            ?>
        </nav>
        <h3><?php bloginfo('description'); ?></h3>
    </header>
    