<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PowerComponents\LivewirePowerGrid\Concerns\SoftDeletes;

class Defect extends Model
{
    use SoftDeletes;

    public $fillable = ['code', 'title', 'is_show'];

    
}
