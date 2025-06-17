<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use DB;
use Illuminate\Http\Request;
use Log;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['blog_cat'] = DB::table('blog_categories')->get();
        return view('backend.blogCategory.index', $data);
    }

    public function create()
    {
        return view('backend.blogCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('_token');
            $data['created_at'] = new \DateTime();
            DB::table('blog_categories')->insert($data);
            DB::commit();
            return redirect()->route('backend.blog_category.index')->with('success', 'Create Blog Category Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to Create Blog Category : ' . $e->getMessage());
            return redirect()->route('backend.blog_category.create')->with('error', 'Failed to Create Blog Category');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['blog_category'] = DB::table('blog_categories')->where('id', $id)->first();
        return view('backend.blogCategory.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('_token');
            $data['updated_at'] = new \DateTime();
            DB::table('blog_categories')
                ->where('id', $id)
                ->update($data);

            DB::commit();
            return redirect()->route('backend.blog_category.index')->with('success', 'Update Blog Category Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to Create Blog Category  : ' . $e->getMessage());
            return redirect()->route('backend.blog_category.update')->with('error', 'Failed to Update Blog Category ');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('blog_categories')->where('id', $id)->delete();
    
        return redirect()->route('backend.blog_category.index')->with('success', 'Xóa thành công');
    }
}
