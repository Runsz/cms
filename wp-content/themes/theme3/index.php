<?php get_header(); ?> 


<!-- Postingan -->
<main id="content">
    <?php if ( have_posts() ):
        while( have_posts() ):  the_post(); ?>

        <?php get_template_part( 'content', get_post_format() ); ?>

    <?php    endwhile;
    endif;?>
</main>


<!-- Berita Terkini & Sidebar -->
<div id="wrapper">
    <main id="custom-content">
        <h2>Berita Terkini</h2>
        <?php 
            $custom_post = new WP_Query(array( 'cat' => '4,5,11','order' => 'ASC', 'orderby' => 'date', 'posts_per_page' => 4,));

            if ($custom_post -> have_posts()):
                while($custom_post->have_posts()): 
                    $custom_post->the_post();?>
                <?php get_template_part("content") ?>
            <?php endwhile;
                else:
                    echo 'Tidak ada berita';    
            endif; 
        ?>
    </main>

    <aside id="sidebar">
        <?php dynamic_sidebar('sidebar1'); ?>

        <div id="recent-post">
            <h2>Riwayat Postingan</h2>

            <?php
                $content = array (
                    'post_type' => array('post','news'),
                );
                $recent_post = new WP_Query($content);?>
                    <?php while ($recent_post->have_posts()) {
                            $recent_post->the_post();?>
                            <h4><a href="<?php the_permalink(); ?>"> - <?php the_title(); ?></a></h4>
                    <?php } ?>
        </div>
    </aside>
</div>


<!-- Custom Post News -->
<?php
$args = array(
	'post_type'      => 'news',
	'posts_per_page' => 3,
);
$loop = new WP_Query($args);?>
<main id="content">
    <h3>Custom Post News</h3>
    <?php while ( $loop->have_posts() ) {
        $loop->the_post();
        ?>
        <?php get_template_part('content') ?>
        <?php
    }?>
</main>


<!-- Post by Admin -->
<?php
$isi = array(
    'post_type' => array('post','news'),
	'author'      => '1',
	'posts_per_page' => 10,
    'order' => 'ASC',
    'orderby' => 'date'
);
$author_post = new WP_Query($isi);?>
<main id="content">
    <h3>Admin Post</h3>
    <?php while ( $author_post->have_posts() ) {
        $author_post->the_post();
        ?>
        <?php get_template_part('content') ?>
        <?php
    }?>
</main>


<?php get_footer() ?>
