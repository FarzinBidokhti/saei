<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PowerComponents\LivewirePowerGrid\Concerns\SoftDeletes;

class Process extends Model
{
    use SoftDeletes;

    public $fillable = ['sub_defect_id', 'equipment', 'reason', 'percent', 'is_sensor', 'section_id'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
