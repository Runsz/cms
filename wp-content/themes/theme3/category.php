<?php 
    get_header();
?>

<main id="content">
    <?php if ( have_posts() ):?>
        <h3 class="sub-judul">
            <?php echo "Halaman Kategori "; echo single_cat_title(); ?>
        </h3>
    <?php while( have_posts() ):  the_post(); ?>            
        <?php get_template_part('content') ?>
    <?php    endwhile;
        endif; ?>
</main>

<?php get_footer(); ?>