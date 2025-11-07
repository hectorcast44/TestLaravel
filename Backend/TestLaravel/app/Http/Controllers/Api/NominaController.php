<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nomina;

class NominaController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()->nominas;
    }
}
