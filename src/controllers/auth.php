<?php

use Psr\Http\Message\ServerRequestInterface;

$app
    ->get('/login', function() use($app){
        $view = $app->service('view.renderer');
        return $view->render('Auth/login.html.twig');
    },'Auth.show_login_form')
    ->post('/login', function(ServerRequestInterface $request) use ($app) {
        $view = $app->service('view.renderer');
        $auth = $app->service('auth');
        $data = $request->getParsedBody();
        $result = $auth->login($data);
        if (!$result)
        {
            return $view->render('Auth/login.html.twig');
        }
        return $app->route('category-costs.list');
    },'Auth.login');

