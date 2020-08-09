<?php


namespace App\Http\Interfaces\Repositories;


use Illuminate\Support\Collection;

interface BaseRepositoryInterface
{

    public function all(): Collection;
}
