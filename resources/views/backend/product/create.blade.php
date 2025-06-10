@extends('backend.layout')
@section('module', 'Product')
@section('action', 'Create')

@section('admin-content')


    <div id="custom_styles" class="col-lg-12 layout-spacing col-md-12 p-4">
        <div class="statbox widget box box-shadow">

            <div class="widget-content widget-content-area">
                <form action="{{ route('backend.product.store') }}" method="post" class="row p-2 g-3 needs-validation" enctype="multipart/form-data"
                    novalidate>
                    @csrf
                    <div class="col-md-4">
                        <label for="" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="" value="" required name="product_name">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Product Price</label>
                        <div class="input-group has-validation">

                            <input type="text" class="form-control" id="" aria-describedby="" required name="product_price">
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Product Description</label>
                        <input type="text" class="form-control" id="" required name="product_description">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="" value="" required name="product_image">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="" class="form-label">Category</label>
                        <select name="category_id" class="form-select" id="" required>
                            <option selected disabled value="">Choose...</option>
                            @foreach ($categories as $cat)
                                <option value="{{$cat->id }}">{{ $cat->category_name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Status</label>
                        <select name="status" class="form-select" id="" required>
                            <option selected disabled value="">Choose...</option>
                            <option value="active">Active</option>
                            <option value="inactive">InActive</option>

                        </select>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="col-12 p-4">
                        <button class="btn btn-primary" type="submit">Submit Form</button>
                    </div>
                </form>
            </div>



        </div>
    </div>
    </div>



@endsection