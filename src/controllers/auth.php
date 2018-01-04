<?php

use Psr\Http\Message\ServerRequestInterface;

$app
    ->get('/login', function() use($app){
        $view = $app->service('view.renderer');
        return $view->render('Auth/login.html.twig');
    },'Auth.show_login_form')
    ->post('/login', function(ServerRequestInterface $request) use ($app) {
        /*$data = $request->getParsedBody();
        $repository = $app->service('category-cost.repository');
        $repository->create($data);
        return $app->route('category-costs.list'); */
    },'Auth.login');

