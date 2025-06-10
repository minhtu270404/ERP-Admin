<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;
use Log;

class CategoryController extends Controller
{
    public function index()
    {

        //ORM ELOQUENT

        //Get All
        // $categories = Category::all();

        // query()

        $categories = Category::query()
            // ->where('status', '=', 'inactive')
            ->orderBy('created_at')
            ->get();

        // where()
        // $categories = Category::where('status', '=', 'active')
        //     ->get();

        //TODO Compact
        // return view('backend.category.index', compact('categories'));

        // Array
        return view('backend.category.index', ['categories' => $categories]);

        //With
        // return view('backend.category.index')->with('categories',$categories);

    }
    public function create()
    {
        return view('backend.category.create');
    }

    public function store(CategoryRequest $request)
    {

        //Eloquent ORM

        // validate the data
        // $this->validate($request, array(
        //     'category_name' => 'required|max:255',
        //     'status' => 'required'
        // ));

        // C1: store in the database

        DB::beginTransaction();

        try {
            $categories = new Category();
            $categories->category_name = $request->category_name;
            $categories->status = $request->status;
            $categories->save();


            DB::commit();
            return redirect()->route('backend.category')->with('success', 'Create Category Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to Create Category : ' . $e->getMessage());
            return redirect()->route('backend.category.create')->with('error', 'Failed to Create Category');
        }
    }
    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('backend.category.edit', compact('categories'));
    }
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $Categories = Category::findOrFail($id);
            $Categories->update([
                'category_name' => $request->category_name,
                'status' => $request->status,

            ]);

            DB::commit();
            return redirect()->route('backend.category')->with('success', 'Edit Category Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to Edit Category : ' . $e->getMessage());
            return redirect()->route('backend.category')->with('success', 'Edit Category Successfully');
        }
    }
   public function destroy($id)
    {   
        $checkExistProd = Product::where('category_id',$id)->exists();
        if($checkExistProd){
                return redirect()->route('backend.category')->with('error', 'Category Can Not Deleted');
        }
        try {
          Category::findOrFail($id)->delete();
                return redirect()->route('backend.category')->with('success', 'Category Deleted Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to Destroy category: ' . $e->getMessage());
            return redirect()->route('backend.category')->with('error', 'Failed to Destroy Category');
        }
    }
}
