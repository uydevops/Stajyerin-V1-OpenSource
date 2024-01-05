<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class ApiController extends Controller
{
    



    public function countries()
    {
        $countries = Country::all();
        return response()->json([
            'success' => true,
            'message' => 'Countries List',
            'data' => $countries
        ]);
    }


}
