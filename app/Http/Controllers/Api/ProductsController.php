<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Repositories\CategoryRepositoryInterface;
use App\Http\Interfaces\Repositories\ProductRepositoryInterface;
use App\Http\Requests\Api\ProductExcelRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Imports\ProductsImport;
use App\Models\Category;
use Maatwebsite\Excel\Facades\Excel;

class ProductsController extends Controller
{

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param Category $category
     * @return ProductCollection
     */
    public function getByCategory(Category $category)
    {
        return new ProductCollection($this->productRepository->findByCategory($category));
    }

    public function store(ProductExcelRequest $request)
    {
        $result = Excel::import(new ProductsImport($this->categoryRepository), $request->excel);
    }
}
