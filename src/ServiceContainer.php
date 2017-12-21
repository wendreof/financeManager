<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 17/12/17
 * Time: 22:23
 */

namespace WLFin;


use Xtreamwayz\Pimple\Container;

class ServiceContainer implements ServiceContainerInterface
{

    private $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    public function add(string $name, $service)
    {
        $this->container[$name] = $service;
    }

    public function addLazy(string $name, callable $callable)
    {
        $this->container[$name] = $this->container->factory($callable);
    }

    public function get(string $name)
    {
        return $this->container->get($name);
    }

    public function has(string $name)
    {
        return $this->container->has($name);
    }
}