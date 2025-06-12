@extends('backend.layout')
@section('module', 'Customer')
@section('action', 'Index')

@section('admin-content')
    <div class="col-12 d-flex justify-content-end">
        <a href="{{ route('backend.customer.create') }}" class="btn btn-primary">Add Customer</a>
    </div>
    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">

                <div style="overflow-x: auto;">
                    <table id="html5-extension" class="table dt-table-hover" style="min-width: 1000px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Birth Date</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Avatar</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $customer->customer_name }}</td>
                                    <td>{{ $customer->customer_email }}</td>
                                    <td>{{ $customer->customer_phone }}</td>
                                    <td>{{ $customer->customer_address }}</td>
                                    <td>{{ $customer->customer_date }}</td>
                                    <td>{{ ucfirst($customer->gender) }}</td>
                                    <td>
                                        <span
                                            class="badge badge-{{ $customer->status === 'active' ? 'success' : 'secondary' }}">
                                            {{ ucfirst($customer->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="usr-img-frame mr-2 rounded-circle">
                                                @if ($customer->customer_image)
                                                    <img alt="avatar" class="img-fluid" src="{{ asset($customer->customer_image) }}" width="40">
                                                @else
                                                    <img alt="avatar" class="img-fluid" src="{{ asset('uploads/default-image.jpg') }}" width="40">
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('backend.customer.destroy', $customer->id) }}" title="Delete" onclick="return confirm('Are you sure you want to delete this product?');">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-trash-2 table-cancel">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4
                                                            a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </a>
                                        <a href="{{ route('backend.customer.edit',$customer->id) }}" aria-expanded="false" class="dropdown-toggle">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-edit">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>

                                        </a>
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