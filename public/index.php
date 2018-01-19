<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 19/12/17
 * Time: 22:59
 */

use Psr\Http\Message\ServerRequestInterface;
use WLFin\Application;
use WLFin\Plugins\AuthPlugin;
use WLFin\Plugins\DbPlugin;
use WLFin\Plugins\RoutePlugin;
use WLFin\Plugins\ViewPlugin;
use WLFin\ServiceContainer;
use Zend\Diactoros\Response;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/helpers.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());

$app->get('/home/{name}/{id}', function(ServerRequestInterface $request) {
    $response = new Response();
    $response->getBody()->write("Response with diactoros emitter");
    return $response;
});

require_once __DIR__ . '/../src/controllers/category-costs.php';
require_once __DIR__ . '/../src/controllers/bill-receives.php';
require_once __DIR__ . '/../src/controllers/bill-pays.php';
require_once __DIR__ . '/../src/controllers/users.php';
require_once __DIR__ . '/../src/controllers/auth.php';

$app->start();
