<?php
if ( !function_exists('get_user_by') ) :
/**
 * Retrieve user info by a given field
 *
 * @since 2.8.0
 * @since 4.4.0 Added 'ID' as an alias of 'id' for the `$field` parameter.
 *
 * @param string     $field The field to retrieve the user with. id | ID | slug | email | login.
 * @param int|string $value A value for $field. A user ID, slug, email address, or login name.
 * @return WP_User|false WP_User object on success, false on failure.
 */
function get_user_by( $field, $value ) {
	$userdata = WP_User::get_data_by( $field, $value );

	if ( !$userdata )
		return false;

	$user = new WP_User;
	$user->init( $userdata );

	return apply_filters( $user, $field, $value );
}
endif;
