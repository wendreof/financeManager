<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 04/01/18
 * Time: 22:09
 */

use WLFin\Application;
use WLFin\Plugins\AuthPlugin;
use WLFin\Plugins\DbPlugin;
use WLFin\ServiceContainer;

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());
return $app;