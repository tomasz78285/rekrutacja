<?php

namespace App\Services;

use App\Models\Customer;
use League\Csv\Writer;

class CustomerService
{
    public function generateCSV()
    {
        $customers = Customer::all();

        $csv = Writer::createFromFileObject(new \SplTempFileObject());

        $csv->insertOne(['ID', 'Imię', 'Nazwisko']);

        foreach ($customers as $customer) {
            $csv->insertOne([
                $customer->id,
                $customer->first_name,
                $customer->last_name,
            ]);
        }

        $filename = 'customers.csv';

        $csv->output($filename);
    }
}
