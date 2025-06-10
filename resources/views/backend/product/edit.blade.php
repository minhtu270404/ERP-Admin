@extends('backend.layout')
@section('module', 'Product')
@section('action', 'Edit')

@section('admin-content')

    <div id="custom_styles" class="col-lg-12 layout-spacing col-md-12 p-4">
        <div class="statbox widget box box-shadow">

            <div class="widget-content widget-content-area">
                <form action="{{ route('backend.product.update', $product->id) }}" method="post" class="row p-2 g-3 needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                              
                    <div class="col-md-4">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name" value="{{ old('product_name', $product->product_name) }}" required>
                        @error('product_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="product_price" class="form-label">Product Price</label>
                        <input type="text" class="form-control @error('product_price') is-invalid @enderror" id="product_price" name="product_price" value="{{ old('product_price', $product->product_price) }}" required>
                        @error('product_price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="product_description" class="form-label">Product Description</label>
                        <input type="text" class="form-control @error('product_description') is-invalid @enderror" id="product_description" name="product_description" value="{{ old('product_description', $product->product_description) }}" required>
                        @error('product_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="product_image" class="form-label">Product Image</label>
                        <input type="file" class="form-control @error('product_image') is-invalid @enderror" id="product_image" name="product_image" accept="image/*">
                        @if ($product->product_image)
                            <small>Current Image: <img src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image" width="100"></small>
                        @endif
                        @error('product_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" id="category_id" required>
                            <option selected disabled value="">Choose...</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror" id="status" required>
                            <option selected disabled value="">Choose...</option>
                            <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 p-4">
                        <button class="btn btn-primary" type="submit">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
