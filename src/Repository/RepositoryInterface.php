<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 28/12/17
 * Time: 23:00
 */

namespace WLFin\Repository;


interface RepositoryInterface
{
    public function all(): array;

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);
}