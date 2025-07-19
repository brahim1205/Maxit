<?php
// session_start();
require_once __DIR__ . '/../vendor/autoload.php';
use App\Core\Router;
$route = require_once __DIR__ . '/../route/route.web.php';

Router::resolve($route);
