<?php get_header();?>

<main id="content">
    <?php if ( have_posts() ):?>
        <h3 class="sub-judul">
            <?php
                if (is_category()) {
                    echo "Halaman Kategori ";single_cat_title();
                }elseif(is_author()){
                    echo "Halaman Author ".get_the_author();
                }else{
                    echo "Halaman Arsip";
                }
            ?>
        </h3>
        <?php while( have_posts() ):  the_post(); ?>

            <?php get_template_part('content'); ?>

    <?php    endwhile;
        endif; ?>
</main>

<?php get_footer();?>