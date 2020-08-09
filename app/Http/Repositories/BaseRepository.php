<?php


namespace App\Http\Repositories;


use App\Http\Interfaces\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
}
