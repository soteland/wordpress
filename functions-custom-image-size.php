//Add custom image size to admin GUI
add_filter( 'image_size_names_choose', 'my_custom_sizes' );
  
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'thumbnail-16-9' => __( '16/9 Thumbnail' ),
    ) );
}

// Add new custom size thumbnail
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );

function wpdocs_theme_setup() {
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'thumbnail-16-9', 533, 300, true );
}
