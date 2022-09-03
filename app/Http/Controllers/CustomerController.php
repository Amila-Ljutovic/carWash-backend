<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    public function getCustomerById(Customer $id)
    {
        return json_decode($id);
    }

    public function create(StoreCustomerRequest $request)
    {
      
        $data_for_save = $request->validated();
        $new_customer = new WashingStep();
        $new_customer->fill($data_for_save);
        $new_customer->save();

        return json_decode($new_customer);
    }
     /**
     * Method used to update resource
     *
     * @param UpdateCustomerRequest $request
     * @param Customer $id
     * 
     */
    public function update(UpdateCustomerRequest $request, Customer $id)
    {
         $updated_data = $request->validated();

         $id->update($updated_data);

         return json_decode($id);
    }

    public function delete(Customer $id)
    {
        $id->delete();

        return 'Customer deleted.';
    }

    public function getAll()
    {
        $customers = Customer::get();

        return json_decode($customers);
        
    }
}
