<?php

spl_autoload_register(function($className) {
  require_once 'classes/' . $className . '.php';
});

// Initialized the route object
$route_obj = new route;

?>