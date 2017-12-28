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
use WLFin\Models\CategoryCost;
use WLFin\Plugins\DbPlugin;
use WLFin\Plugins\RoutePlugin;
use WLFin\Plugins\ViewPlugin;
use WLFin\ServiceContainer;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\RedirectResponse;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());

$app->get('/home/{name}/{id}', function(ServerRequestInterface $request) {
    $response = new Response();
    $response->getBody()->write("Response with diactoros emitter");
    return $response;
});

$app
    ->get('/category-costs', function() use($app){
        $view = $app->service('view.renderer');
        $mymodel = new CategoryCost();
        $categories = $mymodel->all();
        return $view->render('category-costs/list.html.twig', [
            'categories' => $categories
        ]);
    },'category-costs.list')
        ->get('/category-costs/new', function() use($app){
        $view = $app->service('view.renderer');
        return $view->render('category-costs/create.html.twig');
    },'category-costs.new')
    ->post('/category-costs/store', function(ServerRequestInterface $request) use ($app) {
        #creating category
        $data = $request->getParsedBody();
        CategoryCost::create($data);
        return $app->route('category-costs.list');
    },'category-costs.store');

$app->start();
