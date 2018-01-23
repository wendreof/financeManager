<?php

use Psr\Http\Message\ServerRequestInterface;

$app
    ->get('/statements', function(ServerRequestInterface $request) use($app){
        $view = $app->service('view.renderer');
        $data = $request->getQueryParams();

        $dateStart = $data['date_start'] ?? (new \DateTime())->modify('-1 month');
        $dateStart = $dateStart instanceof \DateTime ? $dateStart->format('Y-m-d')
            : \DateTime::createFromFormat('d/m/Y', $dateStart)->format('Y-m-d');

        $dateEnd = $data['date_end'] ?? new \DateTime();
        $dateEnd = $dateEnd instanceof \DateTime ? $dateEnd->format('Y-m-d')
            : \DateTime::createFromFormat('d/m/Y', $dateEnd)->format('Y-m-d');


        print_r($dateStart);
        print_r($dateEnd);
        die();
        return $view->render('statements.html.twig');
    },'statements.list');
