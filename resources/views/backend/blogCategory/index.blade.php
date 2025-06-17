@extends('backend.layout')
@section('module', 'Blog_Category')
@section('action', 'Index')

@section('admin-content')
    <div class="col-12 d-flex justify-content-end">
        <a href="{{ route('backend.blog_category.create') }}" class="btn btn-primary">Add Blog Category</a>
    </div>
    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">

                <div style="overflow-x: auto;">
                    <table id="html5-extension" class="table dt-table-hover" style="min-width: 1000px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Blog Category Name</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blog_cat as $blogcat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $blogcat->blog_category_name }}</td>
                                    <td>
                                        <span class="badge badge-{{ $blogcat->status === 'active' ? 'success' : 'secondary' }}">
                                            {{ ucfirst($blogcat->status) }}
                                        </span>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('backend.blog_category.destroy', $blogcat->id) }}" title="Delete" onclick="return confirm('Are you sure you want to delete this category?');">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 table-cancel">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </a>
                                 
                                        <a href="{{ route('backend.blog_category.edit',$blogcat->id) }}" aria-expanded="false" class="dropdown-toggle">
                                        
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
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