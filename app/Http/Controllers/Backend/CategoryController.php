<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
            ->limit(3)
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
}
