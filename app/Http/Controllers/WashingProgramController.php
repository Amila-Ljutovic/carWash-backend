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
        
        $new_washing_program->washingSteps()->sync(array_column($request->stepsIds, 'id'));
        return json_decode($new_washing_program);
    }

}
