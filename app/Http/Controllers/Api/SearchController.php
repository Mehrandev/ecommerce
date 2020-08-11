<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Repositories\ProductRepositoryInterface;
use App\Http\Resources\Product\ProductCollection;
use Illuminate\Http\Request;

class SearchController extends Controller
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
     * @param Request $request
     * @return ProductCollection
     */
    public function index(Request $request)
    {
        return new ProductCollection($this->productRepository->search($request->keyword));
    }
}
