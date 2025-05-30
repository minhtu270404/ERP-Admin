@extends('backend.layout')
@section('module', 'Customer')
@section('action', 'Create')

@section('admin-content')


    <div id="custom_styles" class="col-lg-12 layout-spacing col-md-12 p-4">
        <div class="statbox widget box box-shadow">

            <div class="widget-content widget-content-area">
                <form class="row p-2 g-3 needs-validation" novalidate>
                    @csrf
                    <div class="col-md-4">
                        <label for="" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" id="" value="" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Customer Email</label>
                        <div class="input-group has-validation">

                            <input type="text" class="form-control" id="" aria-describedby="" required>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Customer Phone</label>
                        <input type="text" class="form-control" id="" required>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Customer Address</label>
                        <input type="text" class="form-control" id="" value="" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Date</label>
                        <input type="date" class="form-control" id="" value="" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Gender</label>
                        <select class="form-select" id="" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                        </select>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Customer Image</label>
                        <input type="file" class="form-control" id="" value="" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Status</label>
                        <select class="form-select" id="" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
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