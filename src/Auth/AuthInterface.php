<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 03/01/18
 * Time: 23:13
 */

namespace WLFin\Auth;


interface AuthInterface
{
    public function login(array $credentials):bool;

    public function check():bool;

    public function logout():void ;
}