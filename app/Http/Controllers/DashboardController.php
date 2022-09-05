<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function data() {

        $number_of_customers = count(Customer::get());
        $max_number_of_washs = Customer::max('washing_number');
        $most_loyal_customer = Customer::where('washing_number', $max_number_of_washs)->first();

        $grouped_transactions_by_washing_program = Transaction::get()->load('washingProgram')->groupBy('washing_program_id');


        return [
            'number_of_customers' => $number_of_customers,
            'most_loyal_customer' => $most_loyal_customer,
            'usage_of_washing_programs' => $grouped_transactions_by_washing_program];
    }
}
