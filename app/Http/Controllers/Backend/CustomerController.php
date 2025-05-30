<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all(); // Lấy tất cả dữ liệu từ bảng customers
        return view('backend.customer.index', compact('customers')); // Trả về view
    }
    public function create()
    {
        return view('backend.customer.create');

    }
}
