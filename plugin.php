<?php
/*
Plugin Name: Query-String-Keeper
Plugin URI: https://github.com/littleskyfish/query-string-keeper
Description: With this plugin, add a query string to the short URL and it will be included in the long url.Tested on YOURLS version 1.8.3 and php version 8.0.12.
Version: 1.1
Author: littleskyfish
Author URI: https://github.com/littleskyfish
*/

// Hook our custom function into the 'pre_redirect' event
yourls_add_filter('redirect_location', 'qs_keeper_redirect' );

// Our custom function that will be triggered when the event occurs
function qs_keeper_redirect($url) {

    $query = getServerQueryString();
    if (isset($query)) {
        if (strpos($url, '?') !== false) {
            $query = '&'.$query;
        }else {
            $query = '?'.$query;
        }
        return $url.$query;
    }else {
        return $url;
    }
}
function getServerQueryString()
{
    if(isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])){
        return $_SERVER['QUERY_STRING'];
    }
    elseif(isset($_SERVER['REQUEST_URI'])) {
        $xpl = explode('/', $_SERVER['REQUEST_URI']);
        $baseName = $xpl[end(array_keys($xpl))];
        if(strpos($baseName, '?') !== false){
             return substr($baseName, strpos($baseName, '?')+1);
        }
    }
    return null;
}
