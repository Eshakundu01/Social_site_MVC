<?php

require_once 'config/confidential.php';

spl_autoload_register(function($className) {
  require_once 'system/classes/' . $className . '.php';
});

// Initialized the route object
$routeObj = new Route();
