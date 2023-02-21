<?php get_header();?>

<main>
    <?php if ( have_posts() ):?>
        <p class="sub-judul">
            <?php
                if (is_category()) {
                    echo "ini Halaman Kategori ";single_cat_title();
                }elseif(is_author()){
                    echo "ini Halaman Author ".get_the_author();
                }else{
                    echo "ini Halaman Arsip";
                }
            ?>
        </p>
    <?php
        while( have_posts() ):  the_post(); ?>
        <h2> <a href=" <?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p>
            <?php echo get_the_excerpt(); ?>
            <a href=" <?php the_permalink(); ?>">Lanjut baca...</a>
        </p>
        <p class="info-meta">
        <a href="<?php echo get_author_posts_url(get_the_author_meta("ID")) ?>">
                <?php the_author();?>
            </a>
            <?php
                echo " || "; the_date('j F, Y'); ?> at <?php the_time('g:i a');
                echo " || Kategori : "; the_category(',');
            ?>
        </p>
    <?php
        endwhile;
        endif;
    ?>
</main>

<?php get_footer();?>