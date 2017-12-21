<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 20/12/17
 * Time: 23:23
 */

namespace WLFin\View;


use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response;

class ViewRenderer implements ViewRendererInterface
{
    private $twigEnvironment;

    /**
     * ViewRenderer constructor.
     */
    public function __construct(\Twig_Environment $twigEnvironment)
    {
        $this->twigEnvironment = $twigEnvironment;
    }

    public function render(string $template, array $context = []): ResponseInterface
    {
        $result = $this->twigEnvironment->render($template, $context);
        $response = new Response();
        $response->getBody()->write($result);
        return $response;
    }

}