<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company
;

class CompanyController extends Controller
{
    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string',
        'address' => 'required|string'
    ]);

    $company = Company::create($data);

    return response()->json($company, 201);
}

}
