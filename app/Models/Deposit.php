<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    public function duser()
    {
        return $this->belongsTo('App\Models\User', 'user');
    }

    public function mt5()
    {
        return $this->belongsTo('App\Models\Mt5Details', 'account_id');
    }
}