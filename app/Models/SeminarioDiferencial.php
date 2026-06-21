<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeminarioDiferencial extends Model
{
    protected $table = 'seminario_diferenciais';
    protected $guarded = ['id'];

    public function seminario(): BelongsTo
    {
        return $this->belongsTo(Seminario::class);
    }
}
