<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Traits\ImageUploadTrait;
use DB;
use Illuminate\Http\Request;
use App\Models\Customer;
use Log;
class CustomerController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $customers= Customer::all(); // Lấy tất cả dữ liệu từ bảng customers
        return view('backend.customer.index', compact('customers')); // Trả về view
    }
    public function create()
    {
        return view('backend.customer.create');

    }
    public function store(CustomerRequest $request)
    {

        DB::beginTransaction();

        $imageCustomer = $this->UploadImage($request, 'customer_image', 'uploads');

        try {
            $customer = new Customer();
            $customer->customer_name = $request->customer_name;
            $customer->customer_email = $request->customer_email;
            $customer->customer_image = $imageCustomer;
            $customer->customer_phone = $request->customer_phone;
            $customer->customer_address = $request->customer_address;
            $customer->customer_date = $request->customer_date;
            $customer->gender = $request->gender;
            $customer->status = $request->status;
            $customer->save();

            DB::commit();
            return redirect()->route('backend.customer.index')->with('success', 'Create Customer Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to Create Customer : ' . $e->getMessage());
            return redirect()->route('backend.customer.create')->with('error', 'Failed to Create Customer');
        }

        //C2
        // Category::create($request->validated());

    }
    public function edit($id)
    {
        $customers = Customer::findOrFail($id);
        return view('backend.customer.edit', compact('customers'));
    }
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $customers = Customer::findOrFail($id);
            $customers->update([

                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,
                'customer_image' => $request->customer_image,
                'gender' => $request->gender,
                'status' => $request->status,

            ]);

            DB::commit();
            return redirect()->route('backend.customer.index')->with('success', 'Customer Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to Update Product: ' . $e->getMessage());
            return redirect()->route('backend.customer.index')->with('error', 'Failed to Update Customer');
        }
    }
    public function destroy($id)
    {
        try {
            Customer::findOrFail($id)->delete();
            return redirect()->route('backend.customer.index')->with('success', 'Customer Deleted Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to Destroy customer: ' . $e->getMessage());
            return redirect()->route('backend.customer.index')->with('error', 'Failed to Destroy Customer');
        }
    }
}
