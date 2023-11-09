<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\adduserrole;

class AddUserRoleController extends Controller
{
    //
    public function insertuserrole (Request $request)
    {
        // $rules =[
        //     'phone' => 'required|integer|between:1,10',
        // ];

        $adduserrole = new adduserrole();
        $adduserrole->name = $request->input('name');
        $adduserrole->user_name = $request->input('user_name');
        $adduserrole-> position = $request->input('position');
        $adduserrole-> phone = $request->input ('phone'); 
        $adduserrole-> save();
        return response() ->json($adduserrole);
}

public function getUserrole()
{
    try {
        $userrole = AddUserrole::all(); // Assuming your model is named 'AddCustomer'
        return response()->json($userrole);
    } catch (\Exception $e) {
        // Log the error
        \Log::error($e->getMessage());
        return response()->json(['error' => 'Database error'], 500);
    }
}

    public function deleteUserrole(Request $request)
    {
        try {
            $user_name = $request->input('user_name');
            $user = AddUserrole::where('user_name', $user_name)->first();
    
            if (!$user) {
                return response()->json(['error' => 'Customer not found'], 404);
            }
    
            $user->delete();
            return response()->json(['message' => 'Customer deleted successfully']);
        } catch (\Exception $e) {
            // Log the error
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Database error'], 500);
        }
}
public function editUser(Request $request)
{
    try {
        $user_name = $request->input('user_name');
        $user = AddUserrole::where('user_name', $user_name)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Update customer data based on the provided request parameters
        if ($request->has('name')) {
            $user->name = $request->input('name');
        }
        if ($request->has('position')) {
            $user->position = $request->input('position');
        }
        if ($request->has('phone')) {
            $user->phone = $request->input('phone');
        }

        $user->save();
        return response()->json(['message' => 'User updated successfully']);
    } catch (\Exception $e) {
        // Log the error
        \Log::error($e->getMessage());
        return response()->json(['error' => 'Database error'], 500);
    }
}


}
