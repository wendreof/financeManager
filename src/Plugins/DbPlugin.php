<?php
declare(strict_types=1);

namespace WLFin\Plugins;

use Psr\Container\ContainerInterface;
use WLFin\Models\BillPay;
use WLFin\Models\BillReceive;
use WLFin\Models\CategoryCost;
use WLFin\Models\User;
use WLFin\Repository\RepositoryFactory;
use WLFin\Repository\StatementRepository;
use WLFin\ServiceContainerInterface;
use Illuminate\Database\Capsule\Manager as Capsule;

class DbPlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $capsule = new Capsule();
        $config = include __DIR__ . '/../../config/db.php';
        $capsule->addConnection($config['development']);
        $capsule->bootEloquent();

        $container->add('repository.factory', new RepositoryFactory());

        $container->addLazy('category-cost.repository', function (ContainerInterface $container) {
            return $container->get('repository.factory')->factory(CategoryCost::class);
        });

        $container->addLazy('bill-receive.repository', function (ContainerInterface $container) {
            return $container->get('repository.factory')->factory(BillReceive::class);
        });

        $container->addLazy('bill-pay.repository', function (ContainerInterface $container) {
                    return $container->get('repository.factory')->factory(BillPay::class);
                });

        $container->addLazy('user.repository', function (ContainerInterface $container) {
            return $container->get('repository.factory')->factory(User::class);
        });

        $container->addLazy('statement.repository', function () {
            return new StatementRepository();
        });
    }
}