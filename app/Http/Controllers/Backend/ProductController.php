<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('products.*','categories.category_name as cat_name' )
                                ->join('categories', 'products.category_id', '=', 'categories.id')
                                ->where('categories.status', '=', 'active')
                                ->get();
        return view('backend.product.index', ['products' => $products]);
    }
}
