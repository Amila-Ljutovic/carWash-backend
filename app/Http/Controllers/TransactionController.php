<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class TransactionController extends Controller
{
    //store
    //get one

    public function getAll()
    {
        $transactions = Transaction::get()->load('customer', 'washingProgram');
        
        return json_decode($transactions);
        
    }

    public function getTransactionById(Transaction $id)
    {
        $id->load('customer', 'washingProgram');
        return json_decode($id);
    }

    public function create(StoreTransactionRequest $request)
    {
        $data_for_save = $request->validated();
        
        $new_transaction = new Transaction();
        $new_transaction->fill($data_for_save);
       
        $new_transaction->save();
        
        $customer = Customer::where('id', $request['customer_id'])->first();
        $customer->update(array('washing_number' => $customer->washing_number+1));

        return json_decode($new_transaction->load('customer', 'washingProgram'));
    }

}
