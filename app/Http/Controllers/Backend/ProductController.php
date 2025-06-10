<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Traits\ImageUploadTrait;
use DB;
use Illuminate\Http\Request;
use App\Models\Product;
use Log;

class ProductController extends Controller
{
    use ImageUploadTrait;
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
            ->orderBy('created_at')
            ->get();
        return view('backend.product.create', compact('categories'));
    }
    public function store(ProductRequest $request)
    {

        DB::beginTransaction();

        $imageProduct = $this->UploadImage($request,'product_image','uploads');
       
        try {
            $products = new Product();
            $products->product_name = $request->product_name;
            $products->product_image = $imageProduct;
            $products->product_price = $request->product_price;
            $products->product_description = $request->product_description;
            $products->category_id = $request->category_id;
            $products->status = $request->status;
            $products->save();
            DB::commit();
            return redirect()->route('backend.product.index')->with('success', 'Create Product Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to Create Products : ' . $e->getMessage());
            return redirect()->route('backend.product.create')->with('error', 'Failed to Create Products');
        }

        //C2
        // Category::create($request->validated());

    }
    public function edit($id)
    {
        $categories = Category::query()
            ->where('status', '=', 'active')
            ->get();
        $product = Product::findOrFail($id);
        return view('backend.product.edit', compact('categories', 'product'));
    }
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $product = Product::findOrFail($id);
            $product->update([
                'product_name' => $request->product_name,
                'product_image' => $request->product_image,
                'product_price' => $request->product_price,
                'product_description' => $request->product_description,
                'category_id' => $request->category_id,
                'status' => $request->status,


            ]);

            DB::commit();
            return redirect()->route('backend.product.index')->with('success', 'Product Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to Update Product: ' . $e->getMessage());
            return redirect()->route('backend.product.index')->with('error', 'Failed to Update Product');
        }
    }
    public function destroy($id)
    {
        try {
            Product::findOrFail($id)->delete();
            return redirect()->route('backend.product.index')->with('success', 'Product Deleted Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to Destroy Product: ' . $e->getMessage());
            return redirect()->route('backend.product.index')->with('error', 'Failed to Destroy Product');
        }
    }

}
