<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 28/12/17
 * Time: 23:05
 */

namespace WLFin\Repository;


use WLFin\Models\BillPay;
use WLFin\Models\BillReceive;

class StatementRepository implements StatementRepositoryInterface
{

    public function all(string $dateStart, string $dateEnd, int $userId): array
    {

        $billPays = BillPay::query()
            ->selectRaw('bill_pays.*, category_costs,name as category_name')
            ->leftJoin('category_costs', 'category_costs.id', '=', 'bill_pays.category_cost_id')
            ->whereBetween('date_launch', [$dateStart, $dateEnd])
            ->where('bill_pays.user_id', $userId)
            ->get();

        $billReceives = BillReceive::query()
            ->whereBetween('date_launch', [$dateStart, $dateEnd])
            ->where('bill_receives.user_id', $userId)
            ->get();
    }
}