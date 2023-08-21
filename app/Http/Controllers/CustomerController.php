<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Services\CustomerService;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function show(Request $request)
    {
        $id = $request->input('id');

        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Klient o podanym ID nie istnieje.'], 404);
        }

        $companyName = $customer->company->name;

        return response()->json([
            'customer' => $customer,
            'company_name' => $companyName,
        ], 200);
    }

    public function generateCSV(CustomerService $customerService)
    {
        return view('customer.generateCSV');
    }

    public function generatingCSV(CustomerService $customerService)
    {
        $customerService->generateCSV();
    }
}
