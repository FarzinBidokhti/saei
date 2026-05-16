<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PowerComponents\LivewirePowerGrid\Concerns\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function processes()
    {
        return $this->hasMany(Process::class);
    }
}
