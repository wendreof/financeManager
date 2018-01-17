<?php
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 14/12/17
 * Time: 23:12
 */

exec(__DIR__ . '/vendor/bin/phinx rollback -t=0');
exec(__DIR__ . '/vendor/bin/phinx migrate');
exec(__DIR__ . '/vendor/bin/phinx seed:run -s UsersSeeder');
exec(__DIR__ . '/vendor/bin/phinx seed:run -s CategoryCostSeeder');