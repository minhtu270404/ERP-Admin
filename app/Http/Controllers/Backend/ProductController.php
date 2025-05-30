<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('products.*', 'categories.category_name as cat_name')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('categories.status', '=', 'active')
            ->get();
        return view('backend.product.index', ['products' => $products]);
    }
    public function create()
    {
        $categories = Category::query()
            ->where('status', '=', 'active')
            ->get();
        return view('backend.product.create', compact('categories'));
    }
    public function store(ProductRequest $request)
    {

        //Eloquent ORM

        // validate the data
        // $this->validate($request, array(
        //     'category_name' => 'required|max:255',
        //     'status' => 'required'
        // ));

        // C1: store in the database
        $products = new Product();
        $products->product_name = $request->product_name;
        $products->product_image = $request->product_image;
        $products->product_price = $request->product_price;
        $products->product_description = $request->product_description;
        $products->category_id = $request->category_id;
        $products->status = $request->status;
        $products->save();

        //C2
        // Category::create($request->validated());

        return redirect()->route('backend.product')->with('success', 'Create Product Successfully');
    }
}
