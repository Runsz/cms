<article id="post">
    <?php the_post_thumbnail('small-thumb'); ?>

    <div id="isi">
        <h3> <a href=" <?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <?php if(!is_single() && !is_page() ) : ?>
            <p>
                <?php echo get_the_excerpt(); ?><br>
                <a href=" <?php the_permalink(); ?>">Selengkapnya...</a>
            </p>
        <?php else : ?>
            <p>
                <?php the_content();?>
            </p>
        <?php endif; ?>

        <?php if (!is_page()) : ?>    
            <p class="info-meta">
                <a href="<?php echo get_author_posts_url(get_the_author_meta("ID")) ?>">
                    <?php the_author();?>
                </a>
                <?php
                    echo " || ". esc_attr(get_the_date()); ?> at <?php the_time('g:i a');
                    echo ' || '; the_taxonomies(); 
                ?>
            </p>
        <?php endif; ?>
    </div>
</article>