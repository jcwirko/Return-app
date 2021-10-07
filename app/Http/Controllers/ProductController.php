<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        //
    }

    public function store(ProductRequest $request)
    {
        Product::create($request->all());

        alert()->success('Producto guardado correctamente');

        return redirect()->route('products.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        $product->fill($request->all());
        $product->save();

        alert()->success('Producto actualizado correctamente');

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        //
    }
}
