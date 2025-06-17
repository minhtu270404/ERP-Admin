@extends('backend.layout')
@section('module', 'Blog_Category')
@section('action', 'Create')

@section('admin-content')


    <div id="custom_styles" class="col-lg-12 layout-spacing col-md-12 p-4  ">
        <div class="statbox widget box box-shadow">

            <div class="widget-content widget-content-area">
                <form action="{{ route('backend.blog_category.store') }}" method="post" class="row p-2 g-3 needs-validation"
                    novalidate>
                    @csrf
                    <div class="col-md-4">
                        <label for="" class="form-label">Blog Category Name</label>
                        <input type="text" class="form-control" id="" value="" required name="blog_category_name">
                  

                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Status</label>
                        <select class="form-select" id="" required name="status">
                            <option selected disabled value="">Choose...</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                 


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