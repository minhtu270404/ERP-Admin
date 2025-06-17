<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Traits\ImageUploadTrait;
use DB;
use Illuminate\Http\Request;
use Log;

class BlogController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = DB::table('blogs')
            ->join('users', 'blogs.author_id', '=', 'users.id')
            ->join('blog_categories', 'blogs.blog_category_id', '=', 'blog_categories.id')
            ->select(
                'blogs.*',
                'users.name as author_name',
                'blog_categories.blog_category_name as category_name'
            )
            ->get();

        return view('backend.blog.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['blog_categories'] = DB::table('blog_categories')->get();
        $data['authors'] = DB::table('users')->get();

        return view('backend.blog.create', $data);
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
            $data['blog_image_main'] = $this->UploadImage($request, 'blog_image_main', 'uploads');
            $data['blog_image_gallery'] = implode('|', $this->UploadMultiImage($request, 'blog_image_gallery', 'uploads'));

            DB::table('blogs')->insert($data);
            DB::commit();
            return redirect()->route('backend.blog.index')->with('success', 'Create Blog Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to Create Blog : ' . $e->getMessage());
            return redirect()->route('backend.blog.index')->with('error', 'Failed to Create Blog');
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
    public function edit($id)
    {
        $data['authors'] = DB::table('users')->get();
        $data['blog_categories'] = DB::table('blog_categories')->get();
        $data['blog'] = DB::table('blogs')->where('id', $id)->first();
        return view('backend.blog.edit', $data);
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
            DB::table('blogs')
                ->where('id', $id)
                ->update($data);

            DB::commit();
            return redirect()->route('backend.blog.index')->with('success', 'Update Blog Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to Create Blog  : ' . $e->getMessage());
            return redirect()->route('backend.blog.index')->with('error', 'Failed to Update Blog ');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         try {
            DB::findOrFail($id)->delete();
            return redirect()->route('backend.blog.index')->with('success', 'Blog Deleted Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to Destroy Blog: ' . $e->getMessage());
            return redirect()->route('backend.blog.index')->with('error', 'Failed to Destroy Blog');
        }
    }
}
