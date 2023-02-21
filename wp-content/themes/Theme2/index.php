<?php get_header(); ?>

<main id="content">
    <?php if ( have_posts() ):
        while( have_posts() ):  the_post(); ?>

        <?php get_template_part( 'content', get_post_format() ); ?>

    <?php    endwhile;
    endif;?>
</main>

<main id="content">
    <?php 
        $custom_post = new WP_Query(array( 'cat' => '2,4' ));

        //var_dump($custom_post->have_posts());

        if ($custom_post -> have_posts()):
            while($custom_post->have_posts()): $custom_post->the_post();?>
            <?php get_template_part("content") ?>

        <?php endwhile;
            else:
                echo 'Tidak ada berita';    
        endif; 
    ?>
</main>

<aside>
    <?php dynamic_sidebar('sidebar1'); ?>
</aside>

<?php get_footer() ?>
