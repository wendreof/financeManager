<?php

use Psr\Http\Message\ServerRequestInterface;

$app
    ->get('/statements', function() use($app){
        $view = $app->service('view.renderer');
        return $view->render('statements.html.twig');
    },'statements.list');

