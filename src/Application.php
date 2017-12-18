<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 18/12/17
 * Time: 21:30
 */

namespace WLFin;


class Application
{
    private $serviveContainer;

    /**
     * Application constructor.
     * @param $seriveContainer
     */
    public function __construct(ServiceContainerInterface $serviveContainer)
    {
        $this->serviveContainer = $serviveContainer;
    }

    public function service($name)
    {
        return $this->serviveContainer->get($name);
    }

    public function addService(string $name, $service)
    {
        if ( is_callable($service) )
        {
            $this->serviveContainer->addLazy($name, $service);
        }
        else
        {
            $this->serviveContainer->add($name, $service);
        }
    }

}