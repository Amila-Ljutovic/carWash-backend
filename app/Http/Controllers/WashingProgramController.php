<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WashingProgram;
use App\Http\Requests\StoreWashingProgramRequest;
use App\Http\Requests\UpdateWashingProgramRequest;

class WashingProgramController extends Controller
{
    public function getWashingProgramById(WashingProgram $id)
    {
        $id->load('washingSteps');
        return json_decode($id);
    }

    public function create(StoreWashingProgramRequest $request)
    {
        $data_for_save = $request->validated();
        $new_washing_program = new WashingProgram();
        $new_washing_program->fill(array('name' => $data_for_save['name'], 'price' => $data_for_save['price']));
        
        $new_washing_program->save();
        
        $new_washing_program->washingSteps()->sync($data_for_save['stepsIds']);
        return json_decode($new_washing_program);
    }

    public function getAll()
    {
        $washing_programs = WashingProgram::get()->load('washingSteps');
        
        return json_decode($washing_programs);
        
    }

    public function update(UpdateWashingProgramRequest $request, WashingProgram $id)
    {
        $updated_data = $request->validated();

        $id->update($updated_data);

        $id->washingSteps()->sync($updated_data['stepsIds']);

        return json_decode($id);
         
    }

    public function delete(WashingProgram $id)
    {
        $id->delete();

        return 'Washing program deleted.';
    }
}
