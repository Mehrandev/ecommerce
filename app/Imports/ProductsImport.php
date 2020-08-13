<?php

namespace App\Imports;

use App\Http\Interfaces\Repositories\CategoryRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToCollection, WithValidation, WithHeadingRow
{
    use Importable;


    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    /**
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        //all rows
        foreach ($rows as $key => $row) {
            //its a product
            Product::create(
                [
                    'name' => $row['name'],
                    'price' => $row['price'],
                    'description' => $row['description'],
                    'quantity' => $row['quantity'],
                    'image_url' => $row['image_url'],
                    'category_id' => $this->categoryRepository->findBySlug($row['category'])->id
                    //its not going to be null because we already did the validation
                ]
            );
        }
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'price' => 'required|integer',
            'description' => 'required|max:1500',
            'quantity' => 'required|integer|min:0|max:1000',
            'image_url' => 'required|url',
            'category' => 'required|exists:categories,slug'

        ];
    }
}
