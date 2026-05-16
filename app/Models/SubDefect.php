<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PowerComponents\LivewirePowerGrid\Concerns\SoftDeletes;

class SubDefect extends Model
{
    use SoftDeletes;

    public $fillable = ['defect_id', 'code', 'title', 'is_show'];

    public function defect()
    {
        return $this->belongsTo(Defect::class);
    }
}
