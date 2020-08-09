<?php


namespace App\Http\Interfaces\Repositories;


use Illuminate\Pagination\LengthAwarePaginator;

interface CategoryRepositoryInterface
{

    /**
     * @return LengthAwarePaginator
     */
    public function all(): LengthAwarePaginator;
}
