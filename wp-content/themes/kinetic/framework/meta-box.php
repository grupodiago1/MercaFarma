<?php 


add_action( 'cmb2_admin_init', 'kinetic_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function kinetic_metaboxes() {
    
    // Start with an underscore to hide fields from custom fields list
    $prefix = '_kinetic_';

    /**
     * Initiate the metabox
     */

    $cmb = new_cmb2_box( array(
        'id'            => 'page_options',
        'title'         => esc_html__( 'Page Setting', 'kinetic' ),
        'object_types'  => array( 'page' ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        
    ) );
    
     $cmb->add_field(  array(
        'name' => esc_html__(' Page Custom Logo Image','kinetic'),
        'desc' => '',
        'id'   => $prefix . 'custom_logo',
        'type'    => 'file',
        
    ));

    $cmb->add_field(  array(
        'name' => esc_html__(' Page Banner Slider','kinetic'),
        'desc' => '',
        'id'   => $prefix . 'page_banner',
        'type'    => 'text',
        
    ));
    
     $cmb->add_field(
        array(
                'name'     => esc_html__( 'Banner SubTitle', 'kinetic' ),
                'desc'     => esc_html__( 'Page Banner SubTittle (optional)', 'kinetic' ),
                'id'       => $prefix . 'banner_subtitle',
                'type'     => 'textarea',
                'on_front' => false,
            )
    );

     $cmb->add_field( array(
        'name' => esc_html__('One Page Menu','kinetic'),
        'desc' => esc_html__('Use One Page Menu For this Page','kinetic'),
        'id'   => $prefix. 'onepage',
        'type' => 'checkbox',
    ) );

     $cmb->add_field( array(
        'name'             => esc_html__( 'Page Header layout', 'kinetic' ),
        'desc'             => esc_html__( 'Select your page header layout', 'kinetic' ),
        'id'               => $prefix . 'header_layout',
        'type'             => 'select',
        
        'options'          => array(
            '1' => esc_html__( 'Default', 'kinetic' ),
            '2' => esc_html__( 'White Header', 'kinetic' ),
            '3' => esc_html__( 'Transparent Conatiner', 'kinetic' ),
            '4' => esc_html__( 'Light Fullwidth', 'kinetic' ),
           
        ),
    ) );

     $cmb->add_field( array(
        'name'             => esc_html__( 'Page Footer layout', 'kinetic' ),
        'desc'             => esc_html__( 'Select your page footer layout', 'kinetic' ),
        'id'               => $prefix . 'footer_layout',
        'type'             => 'select',
        
        'options'          => array(
            '1' => esc_html__( 'Default', 'kinetic' ),
            '2' => esc_html__( 'Pattern Background', 'kinetic' ),
            '3' => esc_html__( 'Dark Background', 'kinetic' ),
           
        ),
    ) );


    $cmb = new_cmb2_box( array(
        'id'            => 'post_options',
        'title'         => esc_html__( 'Post Format Intro', 'kinetic' ),
        'object_types'  => array( 'post', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        
    ) );

    // Regular text field
    $cmb->add_field( array(
        'name'       => esc_html__( 'Post Gallery', 'kinetic' ),
        'desc'       => esc_html__( 'Upload post images for intro slider', 'kinetic' ),
        'id'         => $prefix . 'gallery',
        'type'       => 'file_list',
       
    ) );

   $cmb->add_field(  array(
        'name' => 'oembed URL for post format video',
        'desc' => 'Set Intro video, audio',
        'id'   => $prefix . 'intro_video',
        'type'    => 'oembed',
        
    ));

    $cmb = new_cmb2_box( array(
        'id'            => 'user_edit',
        'title'         => esc_html__( 'User Meta Profile', 'kinetic' ),
        'object_types'  => array( 'user', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        
    ) );
    $cmb->add_field(
        array(
                'name'    => esc_html__( 'Avatar', 'kinetic' ),
                'desc'    => esc_html__( 'field description (optional)', 'kinetic' ),
                'id'      => $prefix . 'avatar',
                'type'    => 'file',
                'save_id' => true,
            )
    );
    $cmb->add_field(
        array(
                'name'     => esc_html__( 'Facebook', 'kinetic' ),
                'desc'     => esc_html__( 'Your Facebook Link (optional)', 'kinetic' ),
                'id'       => $prefix . 'user_facebook',
                'type'     => 'text',
                'on_front' => false,
            )
    );
    $cmb->add_field(
        
        array(
                'name'     => esc_html__( 'Google', 'kinetic' ),
                'desc'     => esc_html__( 'Your Google Link (optional)', 'kinetic' ),
                'id'       => $prefix . 'user_google',
                'type'     => 'text',
                'on_front' => false,
            )
    );
     $cmb->add_field(
        array(
                'name'     => esc_html__( 'Twitter', 'kinetic' ),
                'desc'     => esc_html__( 'Your Twitter Link (optional)', 'kinetic' ),
                'id'       => $prefix . 'user_twitter',
                'type'     => 'text',
                'on_front' => false,
            )
    );
      $cmb->add_field(
        array(
                'name'     => esc_html__( 'Youtube', 'kinetic' ),
                'desc'     => esc_html__( 'Your Youtube Link (optional)', 'kinetic' ),
                'id'       => $prefix . 'user_youtube',
                'type'     => 'text',
                'on_front' => false,
            )
    );
       $cmb->add_field(
        array(
                'name'     => esc_html__( 'Linkedin', 'kinetic' ),
                'desc'     => esc_html__( 'Your Linkedin Link (optional)', 'kinetic' ),
                'id'       => $prefix . 'user_linkedin',
                'type'     => 'text',
                'on_front' => false,
            )
    );
        $cmb->add_field(
        array(
                'name'     => esc_html__( 'Instagram', 'kinetic' ),
                'desc'     => esc_html__( 'Your Instagram Link (optional)', 'kinetic' ),
                'id'       => $prefix . 'user_instagram',
                'type'     => 'text',
                'on_front' => false,
            )
    );
         $cmb->add_field(
        array(
                'name'     => esc_html__( 'Dribbble', 'kinetic' ),
                'desc'     => esc_html__( 'Your Dribbble Link (optional)', 'kinetic' ),
                'id'       => $prefix . 'user_dribble',
                'type'     => 'text',
                'on_front' => false,
            )
    );
    
}


?>