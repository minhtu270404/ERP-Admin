@extends('backend.layout')
@section('module', 'Blog_Category')
@section('action', 'Edit')

@section('admin-content')

    <div id="custom_styles" class="col-lg-12 layout-spacing col-md-12 p-4">
        <div class="statbox widget box box-shadow">

            <div class="widget-content widget-content-area">
                <form action="{{ route('backend.blog_category.update', $blog_category->id) }}" method="post" class="row p-2 g-3 needs-validation" novalidate>
                    @csrf
                

                    <div class="col-md-4">
                        <label for="category_name" class="form-label">Blog Category Name</label>
                        <input type="text" class="form-control @error('blog_category_name') is-invalid @enderror" id="blog_category_name" name="blog_category_name" value="{{ old('category_name', $blog_category->blog_category_name) }}" required>
                        @error('category_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option selected disabled value="">Choose...</option>
                            <option value="active" {{ old('status', $blog_category->status) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $blog_category->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 p-4">
                        <button class="btn btn-primary" type="submit">Update Blog Category</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
