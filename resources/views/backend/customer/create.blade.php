@extends('backend.layout')
@section('module', 'Customer')
@section('action', 'Create')

@section('admin-content')


    <div id="custom_styles" class="col-lg-12 layout-spacing col-md-12 p-4">
        <div class="statbox widget box box-shadow">

            <div class="widget-content widget-content-area">
                <form action="{{ route('backend.customer.store') }}" method="post" class="row p-2 g-3 needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-4">
                        <label for="" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" id="" value="" required name ="customer_name">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Customer Email</label>
                        <div class="input-group has-validation">

                            <input type="text" class="form-control" id="" aria-describedby="" required name ="customer_email">
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Customer Phone</label>
                        <input type="text" class="form-control" id="" required name ="customer_phone">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Customer Address</label>
                        <input type="text" class="form-control" id="" value="" required name ="customer_address">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Date</label>
                        <input type="date" class="form-control" id="" value="" required name="customer_date">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Gender</label>
                        <select class="form-select" id="" required name="gender">
                           <option selected disabled value="">Choose...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Customer Image</label>
                        <input type="file" class="form-control" id="" value="" required name="customer_image">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Status</label>
                        <select class="form-select" id="" required name="status">
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




@endsection