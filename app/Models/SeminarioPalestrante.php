<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeminarioPalestrante extends Model
{
    protected $table = 'seminario_palestrantes';
    protected $guarded = ['id'];

    public function seminario(): BelongsTo
    {
        return $this->belongsTo(Seminario::class);
    }
}
