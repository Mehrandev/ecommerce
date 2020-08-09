<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Repositories\ProductRepositoryInterface;
use App\Http\Resources\Product\ProductCollection;
use App\Models\Category;

class ProductsController extends Controller
{

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param Category $category
     * @return ProductCollection
     */
    public function getByCategory(Category $category)
    {
        return new ProductCollection($this->productRepository->findByCategory($category));
    }
}
