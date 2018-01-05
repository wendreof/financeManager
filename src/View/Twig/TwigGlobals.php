<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 04/01/18
 * Time: 23:06
 */

namespace WLFin\View\Twig;


use Twig_Extension;
use Twig_Extension_GlobalsInterface;
use WLFin\Auth\AuthInterface;

class TwigGlobals extends Twig_Extension implements Twig_Extension_GlobalsInterface
{

    private $auth;

    public function __construct(AuthInterface $auth)
    {
        $this->auth = $auth;
    }

    public function getGlobals()
    {
        return [
            'Auth' => $this->auth
        ];
    }
}