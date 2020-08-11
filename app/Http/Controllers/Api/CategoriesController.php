<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Repositories\CategoryRepositoryInterface;
use App\Http\Resources\Category\CategoryCollection;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return CategoryCollection
     */
    public function index()
    {
        return new CategoryCollection($this->categoryRepository->all());
    }
}
