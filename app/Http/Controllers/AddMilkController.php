<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\addmilk;

class AddMilkController extends Controller
{
        //
        public function insertaddmilk (Request $request)
        {
        
            $addmilk = new addmilk();
            $addmilk->option = $request->input('option');
            $addmilk->id_farmer = $request->input('id_farmer');
            $addmilk-> name = $request->input ('name'); 
            $addmilk-> fat =  $request->input ('fat');
            $addmilk-> litre =  $request->input ('litre');
            $addmilk-> rate =  $request->input ('rate');
            $addmilk-> save();
            return response() ->json($addmilk);
    }
    public function getMilkData()
{
    try {
        $milkdata = addmilk::all(); // Assuming your model is named 'AddCustomer'
        return response()->json($milkdata);
    } catch (\Exception $e) {
        // Log the error
        \Log::error($e->getMessage());
        return response()->json(['error' => 'Database error'], 500);
    }
}

public function deleteMilkdata(Request $request)
{
    try {
        $id_farmer = $request->input('id_farmer');
        $milk = AddMilk::where('id_farmer', $id_farmer)->first();

        if (!$milk) {
            return response()->json(['error' => 'Customer not found'], 404);
        }

        $milk->delete();
        return response()->json(['message' => 'Customer deleted successfully']);
    } catch (\Exception $e) {
        // Log the error
        \Log::error($e->getMessage());
        return response()->json(['error' => 'Database error'], 500);
    }
}
}
