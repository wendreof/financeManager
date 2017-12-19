<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 18/12/17
 * Time: 22:03
 */

namespace WLFin\Plugins;


use Aura\Router\RouterContainer;
use WLFin\ServiceContainerInterface;

class RoutePlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $routerContainer = new RouterContainer(); #register the application routes
        $map = $routerContainer->getMap(); #identify the routes in access
        $matcher = $routerContainer->getMatcher();
        $generator = $routerContainer->getGenerator(); #generate links with base in the registereds routes

        $container->add('routing', $map);
        $container->add('routing.matcher', $matcher);
        $container->add('routing.generator', $generator);
    }
}