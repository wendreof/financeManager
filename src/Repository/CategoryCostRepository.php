<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 28/12/17
 * Time: 23:05
 */

namespace WLFin\Repository;


use Illuminate\Support\Collection;
use WLFin\Models\BillPay;
use WLFin\Models\BillReceive;
use WLFin\Models\CategoryCost;

class CategoryCostRepository extends DefaultRepository implements CategoryCostRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(CategoryCost::class);
    }

    public function sumByPeriod(string $dateStart, string $dateEnd, int $userId): array
    {
        $categories = CategoryCost::query()
            ->selectRaw('category_costs.name, sum(value) as value')
            ->leftJoin('bill_pays', 'bill_pays.category_cost_id', '=', 'category_costs.id')
            ->whereBetween('date_launch', [$dateStart, $dateEnd])
            ->where('category_costs.user_id', $userId)
            ->whereNotNull('bill_pays.category_cost_id')
            ->groupBy('value')
            ->groupBy('category_costs.name')
            ->get();
        return $categories->toArray();
    }
}