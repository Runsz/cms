<?php
    //Menu & Sub Menu

    function menu(){
        add_menu_page('Plugin satu','First Plugin','manage_options','plugin-satu','setting_menu','dashicons-lock','90');
        add_submenu_page('plugin-satu','Sub Menu','Sub Menu','manage_options','sub-menu','sub_menu','');
    }

    function setting_menu(){
        echo '<h1>Selamat Datang di Plugin pertama saya</h1>';
    }

    function sub_menu(){
        echo '<h2>Ini Sub Menu</h2>';
    }

    add_action('admin_menu','menu');


    // //Shortcode
    // function instagram($atts){
    //     $var = shortcode_atts(
    //         array(
    //             'nama' => 'runz.js',
    //             'text' => '<img style="width:30px; height:30px;" src=https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/2048px-Instagram_logo_2022.png>',
    //         ),$atts
    //     );
    //     return '<a target="_blank" href="https://www.instagram.com/'.$var['nama'].'/">'.$var['text'].'</a>';
    // }

    // add_shortcode('instagram','instagram');


                        // Costumizer //

    //Image galery
    function image_galery( \WP_Customize_Manager $wp_customize ) {
        $main_section_id = 'logo_section';

        $wp_customize->add_section(
        $main_section_id,
            [
                'title'  => esc_html__('Image gallery','logo'),
                'description'  => esc_html__('Upload logo','logo'),
            ]
        );

        $logo_names = [
            'Logo one' => 'logo_one',
            'Logo two' => 'logo_two',
            'Logo three' => 'logo_three',
        ];

        foreach ($logo_names as $logo_label => $logo_name) {
            $setting_id = sprintf('ver_%s', $logo_name);
            $wp_customize->add_setting($setting_id);

            $wp_customize->add_control(
                new \WP_Customize_Image_Control(
                    $wp_customize,
                    $setting_id,
                    [
                        'label' => esc_html__($logo_label,'ver'),
                        'section' => $main_section_id,
                        'settings' => $setting_id,
                    ]
                )
            );
        }
    }
    add_action('customize_register', 'image_galery');


    //Social Links
    function social_link( \WP_Customize_Manager $wp_customize ){
        $social_icons = ['facebook','instagram','twitter','git-hub'];

        $wp_customize->add_section(
            'social_link',
                [
                    'title'  => esc_html__('Social Links','sosmed'),
                    'description'  => esc_html__('Social Links','sosmed'),
                ]
            );

        foreach ($social_icons as $social_icon) {
            $setting_id = sprintf('sos_%s_link', $social_icon);

            $wp_customize->add_setting(
                $setting_id,[
                    'default' => '',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'esc_url',
                ]
            );

            $wp_customize->add_control(
                $setting_id,
                [
                    'label' =>  esc_html($social_icon),
                    'section' => 'social_link',
                    'settings' => $setting_id,
                    'type' => 'text',
                ]
            );
        }
    }
    add_action('customize_register', 'social_link');


    //Show / Hide Section
    function hide_section(\WP_Customize_Manager $wp_customize){
        $wp_customize->add_section(
            'hide_section',
            [
                'title' => esc_html__('Show / Hide Section','section') ,
                'description' => esc_html__('Show / Hide Section','section'),
            ]
        );

        $sections_id = ['Galeri','Post','Berita Terkini','Custom Post','Admin Post'];

        foreach ($sections_id as $section_id) {
            $setting_id = sprintf('sec_%s', $section_id);

            $wp_customize->add_setting($setting_id,array(
                'default' => 'Yes',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'esc_html'
                )
            );

            $wp_customize->add_control(
                new WP_Customize_Control(
                    $wp_customize,$setting_id, array(
                        'label' => esc_html($section_id),
                        'section' => 'hide_section',
                        'setting' => 'section_display',
                        'type' => 'select',
                        'choices' => array('No' => 'No', 'Yes' => 'Yes'),
                    )
                )
            );
        }
    }
    add_action('customize_register', 'hide_section');
?>

