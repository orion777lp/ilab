<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $data = [];

        if ($products) {
            foreach ($products as $product) {
                $data[] = [
                    'id'            => $product['id'],
                    'name'          => $product['name'],
                    'price'         => $product['price'],
                    'currency'      => $product['currency'],
                    'quantity'      => $product['quantity'],
                    'category_name' => $product['category_name'],
                    'barcode'       => $product['barcode'],
                    'description'   => $product['description'],
                    'images'        => json_decode($product['images']),
                ];
            }
        }

        if ($data) {
            return response($data, 200)->header('Content-Type', 'application/json');
        }

        return response(null, 200)->header('Content-Type', 'application/json');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product' => 'required|array|min:1',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400)->header('Content-Type', 'application/json');
        }

        $data = [];
        $products = $request->get('product') ?? [];
        foreach ($products as $product) {
            $validator = Validator::make((array) $product, [
                'id' => 'required',
                'name' => 'required',
                'price' => 'required|numeric',
                'currency' => 'required',
                'quantity' => 'required|numeric',
                'category_name' => 'required',
                'barcode' => 'required',
                'description' => 'required',
                'images' => 'required|array',
            ]);

            if ($validator->fails()) {
                return response($validator->errors(), 400)->header('Content-Type', 'application/json');
            }

            $data[] = [
                'id'            => $product['id'],
                'name'          => $product['name'],
                'price'         => $product['price'],
                'currency'      => $product['currency'],
                'quantity'      => $product['quantity'],
                'category_name' => $product['category_name'],
                'barcode'       => $product['barcode'],
                'description'   => $product['description'],
                'images'        => $product['images'],
            ];
        }

        ProductController::add($data);

        return response(
                [
                    'status' => true
                ],
            200)
            ->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    /**
     * Сохраняем запись
     *
     * @param array $products
     * @return void
     */
    static public function add(array $products): void
    {
        foreach ($products as $item) {
            $product = new Product([
                'id' => $item['id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'currency' => $item['currency'],
                'quantity' => $item['quantity'],
                'category_name' => $item['category_name'],
                'barcode' => $item['barcode'],
                'description' => $item['description'],
                'images' => json_encode($item['images']),
            ]);
            $product->save();
        }
    }
}
