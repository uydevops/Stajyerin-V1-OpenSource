<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Countries;
use App\Models\Cities;

class ApiController extends Controller
{

    public function countries()
    {
        try {
            $countries = Countries::all();

            return response()->json([
                'success' => true,
                'message' => 'Countries List',
                'data' => $countries
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching countries',
                'error' => $e->getMessage()
            ], 500); // HTTP status code 500 for internal server error
        }
    }

    public function cities($id)
    {
        try {
            $cities = Cities::where('country_id', $id)->get();

            return response()->json([
                'success' => true,
                'message' => 'Cities List',
                'data' => $cities
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching cities',
                'error' => $e->getMessage()
            ], 500); // HTTP status code 500 for internal server error
        }
    }
}
