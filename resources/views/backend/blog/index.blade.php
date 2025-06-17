@extends('backend.layout')
@section('module', 'Blog')
@section('action', 'Index')

@section('admin-content')
<div class="col-12 d-flex justify-content-end mb-3">
    <a href="{{ route('backend.blog.create') }}" class="btn btn-primary">Add Blog</a>
</div>

<div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area">

            <div style="overflow-x: auto;">
                <table id="html5-extension" class="table dt-table-hover" style="min-width: 1000px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Blog Title</th>
                            <th>Blog Slug</th>
                            <th>Blog Image Main</th>
                            <th>Blog Author</th>
                            <th>Blog Category</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $blog->blog_title }}</td>
                                <td>{{ $blog->blog_slug }}</td>
                                <td>
                                    @if ($blog->blog_image_main)
                                        <img src="{{ asset('storage/' . $blog->blog_image_main) }}" width="100" alt="Main Image">
                                    @else
                                        N/A
                                    @endif
                                </td>
                                  <td>{{ $blog->author_name }}</td>
                                 <td>{{ $blog->category_name }}</td>
                                <td>
                                    <span class="badge badge-{{ $blog->status === 'active' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($blog->status) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('backend.blog.edit', $blog->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                        ✏️
                                    </a>
                                    <form action="{{ route('backend.blog.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this blog?')" class="btn btn-sm btn-danger" title="Delete">
                                            🗑️
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
