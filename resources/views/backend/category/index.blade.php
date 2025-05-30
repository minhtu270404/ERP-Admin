@extends('backend.layout')
@section('module', 'Category')
@section('action', 'Index')

@section('admin-content')


    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div style="overflow-x: auto; width: 100%;">

                        <table id="individual-col-search" class="table dt-table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Category Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Status</th>
                                    <th class="text-center dt-no-sorting">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $cat)
                                    <tr>
                                        <td class="text-center">{{ $cat->id }}</td>
                                        <td>{{ $cat->category_name }}</td>
                                        <td>{{ $cat->created_at }}</td>
                                        <td>{{ $cat->updated_at }}</td>
                                        <td>{{ $cat->status }}</td>
                                        <td class="text-center"><a href="javascript:void(0);" class="bs-tooltip"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-x-circle table-cancel">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                                </svg></a></td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection