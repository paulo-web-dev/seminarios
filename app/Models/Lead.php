<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lead extends Model
{
    protected $table = 'leads';
    protected $guarded = ['id'];

    protected $casts = [
        'extra' => 'array',
    ];

    public function seminario(): BelongsTo
    {
        return $this->belongsTo(Seminario::class);
    }
}
