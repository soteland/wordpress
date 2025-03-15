<?php
/* 
  This function creates a new user and set it to admin
  Why? When you have FTP-access, no user, and no access to database, 
  even using wp-config.php-information about the database.
*/
add_action('init', 'add_my_user');
function add_my_user() {
    $username = 'adminusername'; // be sure to use a cool username
    $email = 'newadminemail'; // insert admin email
    $password = 'strongpassword-here-CHANGE-THIS!!'; // For heavens sake, use a strong random passord, never used anywhere else!

    $user_id = username_exists( $username );
    if ( !$user_id && email_exists($email) == false ) {
        $user_id = wp_create_user( $username, $password, $email );
        if( !is_wp_error($user_id) ) {
            $user = get_user_by( 'id', $user_id );
            $user->set_role( 'administrator' );
        }
    }
}



/* 
  Add custom CSS to editor 
*/
add_action( 'after_setup_theme', 'digifix_gutenberg_css' );

function digifix_gutenberg_css(){
	add_theme_support( 'editor-styles' ); 
	add_editor_style( 'style-editor.css' );
}




/* 
  Disable comments on media 
*/
function filter_media_comment_status( $open, $post_id ) {
    $post = get_post( $post_id );
    if( $post->post_type == 'attachment' ) {
        return false;
    }
    return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );
/* END Disable comments on media */



/* 
  Allow upload of SVG
*/
function add_svg_to_upload_mimes($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'add_svg_to_upload_mimes');



/* 
  Allow SVG
*/
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );


/* 
  Fix SVG display in media library
*/
function fix_svg_display_in_media_library() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg_display_in_media_library' );


/* 
  Allow SVG in HTML
*/
function allow_svg_in_html($allowedposttags, $context) {
    $allowedposttags['svg'] = array(
        'xmlns' => true,
        'viewbox' => true,
        'width' => true,
        'height' => true,
        'fill' => true,
        'stroke' => true,
        // Add other SVG attributes if needed
    );

    // Add <g>, <path>, and other SVG elements with their attributes
    $allowedposttags['g'] = array('fill' => true);
    $allowedposttags['path'] = array('d' => true, 'fill' => true, 'stroke' => true);
    
    return $allowedposttags;
}
add_filter('wp_kses_allowed_html', 'allow_svg_in_html', 10, 2);
