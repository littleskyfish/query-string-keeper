# query-string-keeper
Query String Keeper plugin for YOURLS - tested on YOURLS version 1.8.3 and php version 8.0.12.

Description
-----------
Query String Keeper retains the query string added to the short url and adds it to the long url. If the long URL already includes a query string, it appends it following an ampersand (&) and if not, appends it to the long url following a question mark (?).  

Examples
--------
Examples 1 & 2 use the following short & long URLs configured in YOURLS:  
Short url = `http://sho.rt/keyword`  
Long url  = `http://www.longurl.com`  

_Example 1_  
`http://sho.rt/keyword?foo=bar`  
...becomes...  
`http://www.longurl.com/?foo=bar`  

_Example 2_  
`http://sho.rt/keyword?123`  
...becomes...  
`http://www.longurl.com/?123`  

Example 3 uses the following short & long URLs configured in YOURLS:  
Short url = `http://sho.rt/keyword`  
Long url  = `http://www.longurl.com?foo=bar`  
_Example 3_  
`http://sho.rt/keyword?zoo=car`  
...becomes...  
`http://www.longurl.com/?foo=bar&zoo=car`  

Installation
------------
1. Move query-string-keeper directory to the `/user/plugins` directory of the YOURLS installation.  
2. Go to the Plugins administration page ( *eg* `http://sho.rt/admin/plugins.php` ) and activate the `Query String Keeper` plugin.  

Other/References
----------------
This plugin adapted from the Query String Keeper plugin by [jessemaps](https://github.com/jessemaps/yourls-query-string-keeper).
Solved the problem <PHP v7 for some reason does not return any value in $_SERVER['QUERY_STRING']>.
Thanks for [skarjoss's comment](https://github.com/jessemaps/yourls-query-string-keeper/issues/1#issuecomment-1039690531). 

