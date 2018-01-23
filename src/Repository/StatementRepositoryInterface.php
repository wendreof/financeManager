<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 28/12/17
 * Time: 23:00
 */

namespace WLFin\Repository;


interface StatementRepositoryInterface
{
    public function all(string $dateStart, string $dateEnd, int $userId): array;

}