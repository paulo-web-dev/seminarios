<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeminarioBeneficio extends Model
{
    protected $table = 'seminario_beneficios';
    protected $guarded = ['id'];

    public function seminario(): BelongsTo
    {
        return $this->belongsTo(Seminario::class);
    }
}
