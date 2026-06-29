<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DefectRequest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'defect_request_id',
        'section_id',
        'defect_id',
        'sub_defect_id',
        'reason_text',
        'process_id',
        'type',
        'approved_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function defect()
    {
        return $this->belongsTo(Defect::class);
    }

    public function subDefect()
    {
        return $this->belongsTo(SubDefect::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function process()
    {
        return $this->belongsTo(Process::class);
    }
}
