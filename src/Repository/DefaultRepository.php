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
    private $_modelClass;
    /**
     * @var Model
     */
    private $_model;


    /**
     * DefaultRepository constructor.
     *
     * @param string $modelClass
     */
    public function __construct(string $modelClass)
    {
        $this->_modelClass = $modelClass;
        $this->_model = new $modelClass;
    }

    public function all(): array
    {
        return $this->_model->all()->toArray();
    }

    public function create(array $data)
    {
        $this->_model->fill($data);
        $this->_model->save();
        return $this->_model;
    }

    public function update(int $id, array $data)
    {
        $model = $this->find($id);
        $model->fill($data);
        $model->save();
        return $model;
    }

    public function delete(int $id)
    {
        $model = $this->find($id);
        $model->delete();
    }

    public function find(int $id)
    {
        return $this->_model->findOrFail($id);
    }
}