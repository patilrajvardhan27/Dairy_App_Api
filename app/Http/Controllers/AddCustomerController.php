<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\addcustomer;

class AddCustomerController extends Controller
{
    
    public function insertcustomer (Request $request)
        {
            $addcustomer = new addcustomer();
            $addcustomer->customerpid = $request->input('customerpid');
            $addcustomer->name = $request->input('name');
            $addcustomer->phone = $request->input('phone');
            $addcustomer-> address = $request->input ('address'); 
            $addcustomer-> save();
            return response() ->json($addcustomer);
    }

    public function getCustomers()
    {
        try {
            $customers = AddCustomer::all(); // Assuming your model is named 'AddCustomer'
            return response()->json($customers);
        } catch (\Exception $e) {
            // Log the error
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Database error'], 500);
        }
    }

    public function deleteCustomer(Request $request)
    {
        try {
            $customerpid = $request->input('customerpid');
            $customer = AddCustomer::where('customerpid', $customerpid)->first();
    
            if (!$customer) {
                return response()->json(['error' => 'Customer not found'], 404);
            }
    
            $customer->delete();
            return response()->json(['message' => 'Customer deleted successfully']);
        } catch (\Exception $e) {
            // Log the error
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Database error'], 500);
        }
    }
    
    public function editCustomer(Request $request)
{
    try {
        $customerpid = $request->input('customerpid');
        $customer = AddCustomer::where('customerpid', $customerpid)->first();

        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], 404);
        }

        // Update customer data based on the provided request parameters
        if ($request->has('name')) {
            $customer->name = $request->input('name');
        }
        if ($request->has('phone')) {
            $customer->phone = $request->input('phone');
        }
        if ($request->has('address')) {
            $customer->address = $request->input('address');
        }

        $customer->save();
        return response()->json(['message' => 'Customer updated successfully']);
    } catch (\Exception $e) {
        // Log the error
        \Log::error($e->getMessage());
        return response()->json(['error' => 'Database error'], 500);
    }
}

    

    
}
