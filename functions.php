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
