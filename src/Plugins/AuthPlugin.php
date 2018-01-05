<?php
declare(strict_types=1);

namespace WLFin\Plugins;

use Psr\Container\ContainerInterface;
use WLFin\Auth\Auth;
use WLFin\Auth\JasnyAuth;
use WLFin\ServiceContainerInterface;

class AuthPlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('jasny.auth', function (ContainerInterface $container){
            return new JasnyAuth($container->get('user.repository'));
        });
        $container->addLazy('auth', function (ContainerInterface $container) {
            return new Auth($container->get('jasny.auth'));
        });
    }
}