<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mt5Details extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'login', 'password', 'investor_password', 'phone_password', 'type', 'options', 'leverage', 'balance', 'duration', 'status', 'end_date', 'start_date', 'created_at', 'updated_at', 'currency'];

    public function tuser()
    {
        return $this->belongsTo('App\Models\User', 'client_id');
    }
}
