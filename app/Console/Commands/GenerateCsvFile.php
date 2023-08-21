<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CustomerService;

class GenerateCsvFile extends Command
{
    protected $signature = 'generate:csv';
    protected $description = 'Generowanie pliku co tydzień.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $customerService = new CustomerService();
        $customerService->generateCSV(storage_path('app/public/customers.csv'));
        $this->info('Pomyślnie wygenerowano plik.');
    }
}
