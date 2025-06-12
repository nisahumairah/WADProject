<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // ✅ this is what you were missing

class NutritionController extends Controller
{
    public function index()
    {
        return view('nutrition'); // make sure this file exists in resources/views/
    }
}
