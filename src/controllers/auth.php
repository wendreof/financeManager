<?php

use Psr\Http\Message\ServerRequestInterface;

$app
    ->get('/login', function() use($app){
        $view = $app->service('view.renderer');
        return $view->render('auth/login.html.twig');
    },'auth.show_login_form')
    ->post('/login', function(ServerRequestInterface $request) use ($app) {
        /*$data = $request->getParsedBody();
        $repository = $app->service('category-cost.repository');
        $repository->create($data);
        return $app->route('category-costs.list'); */
    },'auth.login');

