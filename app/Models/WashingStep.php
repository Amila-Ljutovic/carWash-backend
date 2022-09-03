<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WashingStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'duration',
        'substance'
    ];

    protected $casts = [
        'created_at',
        'updated_at'
    ];

    public function washingPrograms() {

        return $this->belongsToMany(WahingProgram::class, 'washing_program_washing_step', 'washing_step_id', 'washing_program_id');
        
    }
}
