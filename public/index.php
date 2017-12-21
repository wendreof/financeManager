<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 19/12/17
 * Time: 22:59
 */

use WLFin\Application;
use WLFin\Plugins\RoutePlugin;
use WLFin\ServiceContainer;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());

$app->get('/', function() {
    echo "Hello World...!";
});

$app->get('/home', function() {
    echo "Showing home...!";
});

$app->start();
