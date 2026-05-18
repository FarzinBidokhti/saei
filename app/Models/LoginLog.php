<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    protected $fillable = [
        'user_id',
        'username',
        'session_id',
        'ip_address',
        'device_type',
        'browser',
        'os',
        'login_at',
        'logout_at',
        'status',
        'description',
        'user_agent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
