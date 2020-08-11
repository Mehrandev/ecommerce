<?php


namespace App\Http\Repositories;


use App\Http\Interfaces\Repositories\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    /**
     * @param Category $category
     * @return LengthAwarePaginator
     */
    public function findByCategory(Category $category): LengthAwarePaginator
    {
        return $this->model::where('category_id', $category->id)
            ->paginate(config('custom.paginate.products'));
    }

    /**
     * @param string $keyword
     * @return LengthAwarePaginator
     */
    public function search(string $keyword): LengthAwarePaginator
    {
        return $this->model::where('name', 'LIKE', '%' . $keyword . '%')->paginate(config('custom.paginate.products'));
    }
}
