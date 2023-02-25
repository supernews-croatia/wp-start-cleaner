<?php
/*
Plugin Name: WP Start Cleaner
Description:Ovaj plugin će očistiti Vašu stranicu od početnih totalno nepotrebnih programa. Napravljen uz pomoć ChatGPT , ovaj program briše programe koje bez razloga zauzimaju Vaš prostor na cloudu!
Version: 2.4.4.3 . posted 25.2.2023. 
Author: Supernews Hrvatska d.o.o.
*/
// Onemogući Akismet Anti-Spam plugin
function disable_akismet() {
    deactivate_plugins( 'akismet/akismet.php' );
}
add_action( 'admin_init', 'disable_akismet' );

// Obriši Akismet Anti-Spam plugin
function delete_akismet() {
    if ( current_user_can( 'activate_plugins' ) ) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
        delete_plugins( array( 'akismet/akismet.php' ) );
    }
}
register_uninstall_hook( __FILE__, 'delete_akismet' );
