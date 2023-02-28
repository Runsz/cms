<?php get_header(); ?> 


<?php
    $sections_id = ['Galeri','Post','Berita Terkini','Custom Post','Admin Post'];

    $section_id = $sections_id;

        $setting_id = sprintf('sec_%s', $section_id[0]);
        $display = get_theme_mod($setting_id);

        if ($display != "No") { ?>
            <?php 
                //Customizer Galeri 
                $logo_names = [
                    'Logo one' => 'logo_one',
                    'Logo two' => 'logo_two',
                    'Logo three' => 'logo_three',
                ];
            ?>
                <div id="image-galeri">
                    <?php
                        foreach ($logo_names as $logo_label => $logo_name){
                            $setting_id = sprintf('ver_%s', $logo_name);
                            $logo_url = get_theme_mod( $setting_id );  
                            
                            if (! empty($logo_url) ) { ?>
                                <img src="<?php echo esc_url($logo_url) ?>" alt="<?php echo $logo_label ?>">
                    <?php   }
                        } ?>
                </div>
        <?php } 

        $setting_id1 = sprintf('sec_%s', $section_id[1]);
        $display1 = get_theme_mod($setting_id1);

        if ($display1 != "No") { ?>
            <!-- Postingan -->
            <main id="content" style="display : <?php echo $display; ?>" class="<?php echo $section_id[0] ?>">
                <?php if ( have_posts() ):
                    while( have_posts() ):  the_post(); ?>

                    <?php get_template_part( 'content', get_post_format() ); ?>

                <?php    endwhile;
                endif;?>
            </main>
        <?php }

        $setting_id2 = sprintf('sec_%s', $section_id[2]);
        $display2 = get_theme_mod($setting_id2);

        if ($display2 != "No") { ?>
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
        <?php }

        $setting_id3 = sprintf('sec_%s', $section_id[3]);
        $display3 = get_theme_mod($setting_id3);

        if ($display3 != "No") { ?>
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
        <?php }

        $setting_id4 = sprintf('sec_%s', $section_id[4]);
        $display4 = get_theme_mod($setting_id4);

        if ($display4 != "No") { ?>
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
        <?php } ?>

<?php
    //Count User

    // $result = count_users();
    // echo 'Ada ', $result['total_users'], ' total user';

    // foreach( $result['avail_roles'] as $role => $count )
    //     echo ', ', $count, ' adalah ', $role;
    // echo '.';
?>


<?php get_footer() ?>