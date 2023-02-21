<?php
    get_header();
?>

<main>
    <?php if ( have_posts() ):
        while( have_posts() ):  the_post(); ?>
        <h2> <a href=" <?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p>
            <?php echo get_the_excerpt(); ?>
            <a href=" <?php the_permalink(); ?>">Selengkapnya</a>
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

<?php get_footer() ?>