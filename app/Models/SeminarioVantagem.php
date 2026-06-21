<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeminarioVantagem extends Model
{
    protected $table = 'seminario_vantagens';
    protected $guarded = ['id'];

    protected $casts = [
        'destaque' => 'boolean',
    ];

    public function seminario(): BelongsTo
    {
        return $this->belongsTo(Seminario::class);
    }
}
