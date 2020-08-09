<?php


namespace App\Http\Repositories;


use App\Http\Interfaces\Repositories\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function all(): LengthAwarePaginator
    {
        return $this->model::with('children')
            ->whereNull('parent_id')
            ->paginate(config('custom.paginate.categories'));
    }
}
