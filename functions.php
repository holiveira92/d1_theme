<?php
add_filter('show_admin_bar', '__return_false');
require get_template_directory() . '/include/function-admin.php';
//echo plugin_dir_path('d1_plugin.php');die;
//require_once plugin_dir_path('d1_plugin.php') . '/includes/base/d1_settings_api.php';