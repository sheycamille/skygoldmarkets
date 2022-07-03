<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'state_id', 'name', 'full_name', 'code', 'status', 'iana_timezone', 'created_at', 'updated_at', 'deleted_at',
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
