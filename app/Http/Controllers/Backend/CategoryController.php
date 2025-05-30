<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

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
        $categories = new Category();
        $categories->category_name = $request->category_name;
        $categories->status = $request->status;
        $categories->save();

        //C2
        // Category::create($request->validated());
        
        return redirect()->route('backend.category')->with('success', 'Create Category Successfully');
    }
}
