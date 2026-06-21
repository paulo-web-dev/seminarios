<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeminarioPlano extends Model
{
    protected $table = 'seminario_planos';
    protected $guarded = ['id'];

    protected $casts = [
        'itens'    => 'array',
        'destaque' => 'boolean',
    ];

    public function seminario(): BelongsTo
    {
        return $this->belongsTo(Seminario::class);
    }
}
