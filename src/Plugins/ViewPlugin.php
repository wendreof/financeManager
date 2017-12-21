<?php
declare(strict_types=1);

namespace WLFin\Plugins;


use Interop\Container\ContainerInterface;
use Twig_Environment;
use Twig_Loader_Filesystem;
use WLFin\ServiceContainerInterface;
use WLFin\View\ViewRenderer;

class ViewPlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('twig', function (ContainerInterface $container) {
            $loader = new Twig_Loader_Filesystem(__DIR__ . '/../../templates');
            $twig = new Twig_Environment($loader);
            return $twig;
        });

        $container->addLazy('view.renderer', function (ContainerInterface $container) {
            $twigEnvironment = $container->get('twig');
            return new ViewRenderer($twigEnvironment);
        });
    }
}