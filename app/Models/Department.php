<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PowerComponents\LivewirePowerGrid\Concerns\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    protected $fillable = ['title'];
}
