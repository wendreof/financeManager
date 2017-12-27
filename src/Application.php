<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 18/12/17
 * Time: 21:30
 */
declare(strict_types=1);

namespace WLFin;


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use WLFin\Plugins\PluginInterface;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;

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

    public function get($path, $action, $name = null): Application{
        $routing = $this->service('routing');
        $routing->get($name, $path, $action);
        return $this;
    }

    public function post($path, $action, $name = null): Application{
            $routing = $this->service('routing');
            $routing->post($name, $path, $action);
            return $this;
    }

    public function start(){
        $route = $this->service('route');
        /** @var ServerRequestInterface $request */
        $request = $this->service(RequestInterface::class);

        if( !$route )
        {
            echo "Page not found";
            exit;
        }

        foreach ( $route->attributes as $key => $value )
        {
            $request = $request->withAttribute($key, $value);
        }

        $callable = $route->handler;
        $response = $callable($request);
        $this->emitResponse($response);
    }

    protected function emitResponse(ResponseInterface $response)
    {
        $emitter = new SapiEmitter();
        $emitter->emit($response);
    }

}