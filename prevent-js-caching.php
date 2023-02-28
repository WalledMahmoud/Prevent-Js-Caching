<?php
/*
Plugin Name: Prevent JS Caching
Plugin URI: https://github.com/WalledMahmoud/Prevent-Js-Caching
Description: Prevents JavaScript files from being cached on WordPress by adding a version parameter to the URL.
Version: 1.0
Author: Walled Mahmoud Soliman
Author URI: https://walledmahmoud.github.io/WalledMahmoud
*/

function prevent_js_caching($url)
{
    if (strpos($url, 'wp-content/themes/') !== false && strpos($url, '.js') !== false)
        $url = add_query_arg('v', time(), $url);
    return $url;
}
add_filter('script_loader_src', 'prevent_js_caching', 10, 1);
