<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 20/12/17
 * Time: 23:19
 */

declare(strict_types=1);
namespace WLFin\View;


use Psr\Http\Message\ResponseInterface;

interface ViewRendererInterface
{
    public function render(string $template, array $context = []): ResponseInterface;
}