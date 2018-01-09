<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 08/01/18
 * Time: 22:06
 */

namespace WLFin\Models;


interface UserInterface
{
    public function getId():int;
    public function getFullName():string;
    public function getEmail():string;
    public function getPassword():string;
}