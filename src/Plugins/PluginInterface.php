<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 18/12/17
 * Time: 21:45
 */

namespace WLFin\Plugins;


use WLFin\ServiceContainerInterface;

interface PluginInterface
{
    public function register(ServiceContainerInterface $container);
}