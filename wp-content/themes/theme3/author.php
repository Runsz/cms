<?php 
    get_header();
?>

<?php
    $author = get_the_author_meta('ID');

    $isi = array(
        'post_type' => array('post','news'),
        'author'      => $author,
    );
    $author_post = new WP_Query($isi);
?>

<main id="content">
        <h3 class="sub-judul">
            <?php echo "Halaman Author ".get_the_author(); ?>
        </h3>
    <?php while ( $author_post->have_posts() ) {
        $author_post->the_post();?>

        <?php get_template_part('content') ?>
    <?php } ?>
</main>

<?php get_footer(); ?>