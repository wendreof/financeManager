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
    /**
     * @var string
     */
    private $modelClass;
    /**
     * @var Model
     */
    private $model;

    /**
     * DefaultRepository constructor.
     *
     * @param string $modelClass
     */

    public function __construct(string $modelClass)
    {
        $this->modelClass = $modelClass;
        $this->model = new $modelClass;
    }

    public function all(): array
    {
        return $this->model->all()->toArray();
    }

    public function create(array $data)
    {
        $this->model->fill($data);
        $this->model->save();
        return $this->model;
    }

    public function update($id, array $data)
    {
        $model = $this->findInternal($id);
        $model->fill($data);
        $model->save();
        return $model;
    }

    public function delete($id)
    {
        $model = $this->findInternal($id);
        $model->delete();
    }

    protected function findInternal($id)
    {
        return is_array($id) ? $this->findOneBy($id) : $this->find($id);
    }

    public function find(int $id, bool $failIfNotExist = true)
    {
        return $failIfNotExist?$this->model->findOrFail($id):
            $this->model->findOrFail($id);
    }

    public function findByField(string $field,$value)
    {
        return $this->model->where($field, '=', $value)->get();
    }

    public function findOneBy(array $search)
    {
        $queryBuilder = $this->model;
        foreach ($search as $field => $value){
            $queryBuilder = $queryBuilder->where($field, '=', $value);
        }

        return $queryBuilder->firstOrFail();
    }

}