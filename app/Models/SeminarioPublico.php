<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeminarioPublico extends Model
{
    protected $table = 'seminario_publicos';
    protected $guarded = ['id'];

    public function seminario(): BelongsTo
    {
        return $this->belongsTo(Seminario::class);
    }
}
