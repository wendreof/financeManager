<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 18/12/17
 * Time: 21:30
 */
declare(strict_types=1);

namespace WLFin;


use WLFin\Plugins\PluginInterface;

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

    public function addService(string $name, $service): void
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

    public function plugin(PluginInterface $plugin): void
    {
        $plugin->register($this->serviveContainer);
    }

}