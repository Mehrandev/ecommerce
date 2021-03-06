<?php


namespace App\Http\Interfaces\Repositories;


use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductRepositoryInterface
{
    /**
     * @param Category $category
     * @return LengthAwarePaginator
     */
    public function findByCategory(Category $category): LengthAwarePaginator;

    /**
     * @param string $keyword
     * @return LengthAwarePaginator
     */
    public function search(string $keyword): LengthAwarePaginator;
}
