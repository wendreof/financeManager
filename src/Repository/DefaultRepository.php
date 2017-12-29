<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: wlf
 * Date: 28/12/17
 * Time: 23:05
 */

namespace WLFin\Repository;


class DefaultRepository implements RepositoryInterface
{
    private $modelClass;
    /**
     * @var Model
     */
    private $model;

    public function __construct(string $modelClass)
    {
        $this->modelClass = $modelClass;
        $this->model = new $modelClass;
    }


    public function all(): array
    {
        // TODO: Implement all() method.
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update(int $id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}