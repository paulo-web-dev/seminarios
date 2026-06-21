<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeminarioDia extends Model
{
    protected $table = 'seminario_dias';
    protected $guarded = ['id'];

    protected $casts = [
        'horarios' => 'array',
        'topicos'  => 'array',
    ];

    public function seminario(): BelongsTo
    {
        return $this->belongsTo(Seminario::class);
    }
}
