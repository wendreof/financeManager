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

     public function find(int $id, bool $failIfNotExist = true);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);

    public function findByField(string $field, $value);

    public function findOneBy(array $search);
}