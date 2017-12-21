<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 19/12/17
 * Time: 22:59
 */

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;
use WLFin\Application;
use WLFin\Plugins\RoutePlugin;
use WLFin\ServiceContainer;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());

$app->get('/', function(RequestInterface $request) {
    var_dump($request->getUri()); die();
    echo "Hello World...!";
});

$app->get('/home/{name}/{id}', function(ServerRequestInterface $request) {
    echo "Showing home...!";
    echo "<br/>" . $request->getAttribute('name');
    echo "<br/>" . $request->getAttribute('id');

});

$app->start();
