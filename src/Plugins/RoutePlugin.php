<?php
declare(strict_types =1);

/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 18/12/17
 * Time: 22:03
 */

namespace WLFin\Plugins;


use Aura\Router\RouterContainer;
use Interop\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;
use WLFin\ServiceContainerInterface;
use Zend\Diactoros\ServerRequestFactory;

class RoutePlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $routerContainer = new RouterContainer(); #register the application routes
        $map = $routerContainer->getMap(); #identify the routes in access
        $matcher = $routerContainer->getMatcher();
        $generator = $routerContainer->getGenerator(); #generate links with base in the registereds routes

        $request = $this->getRequest();
        $container->add('routing', $map);
        $container->add('routing.matcher', $matcher);
        $container->add('routing.generator', $generator);
        $container->add(RequestInterface::class, $request);

        $container->addLazy('route', function (ContainerInterface $container){
            $matcher = $container->get('routing.matcher');
            $request = $container->get(RequestInterface::class);
            return $matcher->match($request);
        });
}


    protected  function getRequest(): RequestInterface
    {
        return ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );
    }
}