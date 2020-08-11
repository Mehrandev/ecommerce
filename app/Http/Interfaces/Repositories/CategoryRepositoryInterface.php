<?php


namespace App\Http\Interfaces\Repositories;


use Illuminate\Pagination\LengthAwarePaginator;

interface CategoryRepositoryInterface
{

    /**
     * @return LengthAwarePaginator
     */
    public function all(): LengthAwarePaginator;

    /**
     * @param string $slug
     * @return object|null
     */
    public function findBySlug(string $slug): ?object;
}
