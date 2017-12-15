<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 14/12/17
 * Time: 23:50
 */

declare(strict_types=1);
namespace WLFin;


interface ServiceContainerInterface
{
    public function add(string $name,$service);

    public function addLazy(string $name, callable $callable);

    public function get(string $name);

    public function has(string $name);
}