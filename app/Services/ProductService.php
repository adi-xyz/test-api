<?php

namespace App\Services;

use App\Contracts\ProductServiceInterface;
use App\Models\Product;
use Illuminate\Support\Facades\HTTP;

class ProductService implements ProductServiceInterface
{
    public $result = [];

    function create($data = '')
    {
        $response = HTTP::get('https://dummyjson.com/products?'. $data); // Убрать в случае реализации метода и добавить валидацию
        foreach ($response->json()['products'] as $product){
            $this->result[] = Product::create($product);
        }
        return response()->json($this->result, 201);
    }

    public function store($request)
    { dd($request->json()['products']);
        foreach ($request->json()['products'] as $product){
            $this->result[] = Product::create($product);
        }
        return response()->json($this->result[], 201);
    }

    function delete($id)
    {
        return Product::destroy($id);
    }

    function list(?int $limit = 10)
    {
        return Product::limit($limit)->get();
    }

    function read($id)
    {
        return Product::find($id);
    }

    function update($id, $data)
    {
        // Implementation here
    }
}