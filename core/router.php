<?php
require CONFIG . "/routes.php";


$uri = parse_url($_SERVER['REQUEST_URI']); // array(1) { ["path"]=> string(10) "/blog-app/" }
$uri = trim($uri["path"], "/"); //"blog-app"

// var_dump($routes);
var_dump($uri);
if (array_key_exists($uri, $routes)) {
    require CONTROLLERS . "/$routes[$uri]";
} else {
    echo "PAGE NOT FOUND";
}