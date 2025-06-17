@extends('backend.layout')
@section('module', 'Blog')
@section('action', 'Create')

@section('admin-content')
<div class="col-lg-12 layout-spacing col-md-12 p-4">
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area">
            <form action="{{ route('backend.blog.store') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation p-4" novalidate>
                @csrf

                <!-- Blog Title -->
                <div class="col-md-4">
                    <label for="blog_title" class="form-label">Blog Title</label>
                    <input type="text" name="blog_title" id="blog_title" class="form-control" value="{{ old('blog_title') }}" required>
                    @error('blog_title')<div class="text-danger">{{ $message }}</div>@enderror
                </div>

                <!-- Blog Slug -->
                <div class="col-md-4">
                    <label for="blog_slug" class="form-label">Blog Slug</label>
                    <input type="text" name="blog_slug" id="blog_slug" class="form-control" value="{{ old('blog_slug') }}" required>
                    @error('blog_slug')<div class="text-danger">{{ $message }}</div>@enderror
                </div>

                <!-- Blog Image Main -->
                <div class="col-md-4">
                    <label for="blog_image_main" class="form-label">Blog Image Main</label>
                    <input type="file" name="blog_image_main" id="blog_image_main" class="form-control" required>
                    @error('blog_image_main')<div class="text-danger">{{ $message }}</div>@enderror
                </div>

                <!-- Blog Image Gallery -->
                <div class="col-md-4">
                    <label for="blog_image_gallery" class="form-label">Blog Image Gallery</label>
                    <input type="file" name="blog_image_gallery[]" id="blog_image_gallery" class="form-control" multiple required>
                    @error('blog_image_gallery')<div class="text-danger">{{ $message }}</div>@enderror
                </div>

                <!-- Blog Content -->
                <div class="col-md-8">
                    <label for="blog_content" class="form-label">Blog Content</label>
                    <textarea name="blog_content" id="blog_content" class="form-control" rows="5" required>{{ old('blog_content') }}</textarea>
                    @error('blog_content')<div class="text-danger">{{ $message }}</div>@enderror
                </div>

                <!-- Author -->
                <div class="col-md-4">
                    <label for="author_id" class="form-label">Author</label>
                    <select name="author_id" id="author_id" class="form-select" required>
                        <option selected disabled value="">Choose...</option>
                        @foreach ($authors as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('author_id')<div class="text-danger">{{ $message }}</div>@enderror
                </div>

                <!-- Blog Category -->
                <div class="col-md-4">
                    <label for="blog_category_id" class="form-label">Blog Category</label>
                    <select name="blog_category_id" id="blog_category_id" class="form-select" required>
                        <option selected disabled value="">Choose...</option>
                        @foreach ($blog_categories as $item)
                            <option value="{{ $item->id }}" {{ old('blog_category_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->blog_category_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('blog_category_id')<div class="text-danger">{{ $message }}</div>@enderror
                </div>

                <!-- Status -->
                <div class="col-md-4">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select" required>
                        <option selected disabled value="">Choose...</option>
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')<div class="text-danger">{{ $message }}</div>@enderror
                </div>

                <!-- Submit Button -->
                <div class="col-12 p-4">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
