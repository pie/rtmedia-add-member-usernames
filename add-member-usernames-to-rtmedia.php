<?php
/*
Plugin Name: Add Member Usernames to RTMedia Comments
Description: Add @user_nicename to RTMedia comments
Version:     0.1
Author:      The team at PIE
Author URI:  http://pie.co.de
License:     GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

/* WooCommerce/Stripe Add New Card as Default is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or any later version.

WooCommerce/Stripe Add New Card as Default is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with WooCommerce/Stripe Add New Card as Default. If not, see https://www.gnu.org/licenses/gpl-3.0.en.html */

namespace PIE\AddMemberUsernamesToRTMedia;

/**
 * Adjust HTML on RTMedia picture comments to add user's @ name
 */
function add_username_to_photo_comments( $html, $comment ) {
    if ( isset( $comment['user_id'] ) && $comment['user_id'] ) {
        $user = get_user_by( 'id', $comment['user_id'] );
        $html = str_replace( '<span class ="rtmedia-comment-date">', '<span class="user-nicename">@' . $user->user_nicename . '</span><span class ="rtmedia-comment-date">', $html );
    }
    return $html;
}
add_filter( 'rtmedia_single_comment', '\PIE\AddMemberUsernamesToRTMedia\add_username_to_photo_comments', 10, 2 );
