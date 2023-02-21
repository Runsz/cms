<?php
    get_header();
?>

<main id='content'>
    <?php 
        if (have_posts()) :
            while (have_posts()) : the_post()?>
            <div id="category">
                <h2><?php the_title() ?></h2>
                <?php wp_list_categories() ?>
            </div>
    <?php
            endwhile;
        endif;
    ?>
</main>

<?php get_footer() ?>