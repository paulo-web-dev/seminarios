<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeminarioFoto extends Model
{
    protected $table = 'seminario_fotos';
    protected $guarded = ['id'];

    public function seminario(): BelongsTo
    {
        return $this->belongsTo(Seminario::class);
    }
}
