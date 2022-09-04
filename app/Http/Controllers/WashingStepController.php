<?php

namespace App\Http\Controllers;

use App\Models\WashingStep;
use Illuminate\Http\Request;
use App\Http\Requests\StoreWashingStepRequest;
use App\Http\Requests\UpdateWashingStepRequest;

class WashingStepController extends Controller
{
    public function getWashingStepById(WashingStep $id)
    {
        return json_decode($id);
    }

    public function create(StoreWashingStepRequest $washing_step)
    {
      
        $data_for_save = $washing_step->validated();
        $new_washing_step = new WashingStep();
        $new_washing_step->fill($data_for_save);
        $new_washing_step->save();

        return json_decode($new_washing_step);
    }
     /**
     * Method used to update resource
     *
     * @param UpdateWashingStepRequest $request
     * @param WashingStep $id
     * 
     */
    public function update(UpdateWashingStepRequest $request, WashingStep $id)
    {
         $updated_data = $request->validated();

         $id->update($updated_data);

         return json_decode($id);
    }

    public function delete(WashingStep $id)
    {
        $id->delete();

        return 'Washing step deleted.';
    }

    public function getAll()
    {
        $washing_steps = WashingStep::get();

        return json_decode($washing_steps);
        
    }
}
