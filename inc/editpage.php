<?php /**
 * Check if the current page is a post edit page
 *
 * @param  string  $new_edit what page to check for. Accepts 'new' - new post page , 'edit' - edit post page and 'null' for either
 * @return boolean
 */

function is_edit_page($new_edit = null){
    global $pagenow;
    //make sure we are on the backend
    if (!is_admin()) return false;

    if($new_edit == "edit")
        return in_array( $pagenow, array( 'post.php',  ) );
    elseif($new_edit == "new") //check for new post page
        return in_array( $pagenow, array( 'post-new.php' ) );
    else //check for either new or edit
        return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
}