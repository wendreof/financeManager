<?php
declare(strict_types=1);

namespace WLFin\Plugins;

use Psr\Container\ContainerInterface;
use WLFin\ServiceContainerInterface;

class AuthPlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('Auth', function (ContainerInterface $container) {
            return new Auth();
        });
    }
}