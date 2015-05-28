<?php 

add_action('admin_head', 'bizzyforms_add_my_bzf_button');

function bizzyforms_add_my_bzf_button() {
    global $typenow;
    // check user permissions
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
    return;
    }
    // verify the post type
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return;
    // check if WYSIWYG is enabled
    if ( get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "bizzyforms_add_tinymce_plugin");
        add_filter('mce_buttons', 'bizzyforms_register_my_bzf_button');
    }
}

function bizzyforms_add_tinymce_plugin($plugin_array) {
    $plugin_array['bizzyforms_bzf_button'] = plugins_url( '../js/bizzy-button.js', __FILE__ ); // CHANGE THE BUTTON SCRIPT HERE
    return $plugin_array;
}

function bizzyforms_register_my_bzf_button($buttons) {
   array_push($buttons, "bizzyforms_bzf_button");
   return $buttons;
}

?>