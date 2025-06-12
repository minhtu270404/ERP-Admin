@extends('backend.layout')
@section('module', 'Customer')
@section('action', 'edit')

@section('admin-content')


    <div id="custom_styles" class="col-lg-12 layout-spacing col-md-12 p-4">
        <div class="statbox widget box box-shadow">

            <div class="widget-content widget-content-area">
                <form action="{{ route('backend.customer.update', $customers->id) }}" method="post"
                    class="row p-2 g-3 needs-validation" novalidate enctype="multipart/form-data">
                    @csrf

                    <div class="col-md-4">
                        <label for="" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" @error('customer_name') is-invalid @enderror
                            id="customer_name" name="customer_name"
                            value="{{ old('customer_name', $customers->customer_name) }}" required name="customer_name">
                        <div class="valid-feedback">
                            @error('product_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            Looks good!
                        </div>
                    </div>
                    {{-- Customer Email --}}
                    <div class="col-md-4">
                        <label for="customer_email" class="form-label">Customer Email</label>
                        <input type="text" class="form-control @error('customer_email') is-invalid @enderror"
                            id="customer_email" name="customer_email"
                            value="{{ old('customer_email', $customers->customer_email) }}" required>
                        @error('customer_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Customer Phone --}}
                    <div class="col-md-3">
                        <label for="customer_phone" class="form-label">Customer Phone</label>
                        <input type="text" class="form-control @error('customer_phone') is-invalid @enderror"
                            id="customer_phone" name="customer_phone"
                            value="{{ old('customer_phone', $customers->customer_phone) }}" required>
                        @error('customer_phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Customer Address --}}
                    <div class="col-md-4">
                        <label for="customer_address" class="form-label">Customer Address</label>
                        <input type="text" class="form-control @error('customer_address') is-invalid @enderror"
                            id="customer_address" name="customer_address"
                            value="{{ old('customer_address', $customers->customer_address) }}" required>
                        @error('customer_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Date --}}
                    <div class="col-md-4">
                        <label for="customer_date" class="form-label">Date</label>
                        <input type="date" class="form-control @error('customer_date') is-invalid @enderror"
                            id="customer_date" name="customer_date"
                            value="{{ old('customer_date', $customers->customer_date) }}" required>
                        @error('customer_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Gender --}}
                    <div class="col-md-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender"
                            required>
                            <option disabled value="">Choose...</option>
                            <option value="male" {{ old('gender', $customers->gender) == 'male' ? 'selected' : '' }}>Male
                            </option>
                            <option value="female" {{ old('gender', $customers->gender) == 'female' ? 'selected' : '' }}>
                                Female</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Customer Image --}}
                    <div class="col-md-4">
                        <label for="customer_image" class="form-label">Customer Image</label>
                        <input type="file" class="form-control @error('customer_image') is-invalid @enderror"
                            id="customer_image" name="customer_image">
                        @error('customer_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="col-md-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status"
                            required>
                            <option disabled value="">Choose...</option>
                            <option value="active" {{ old('status', $customers->status) == 'active' ? 'selected' : '' }}>
                                Active</option>
                            <option value="inactive" {{ old('status', $customers->status) == 'inactive' ? 'selected' : '' }}>
                                Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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