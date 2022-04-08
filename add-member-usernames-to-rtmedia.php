<?php
/*
Plugin Name: Add Member Usernames to RTMedia Comments
Description: Add @user_nicename to RTMedia comments
Version:     0.1
Author:      The team at PIE
Author URI:  http://pie.co.de
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

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
