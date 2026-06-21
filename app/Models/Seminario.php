<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seminario extends Model
{
    protected $table = 'seminarios';

    protected $guarded = ['id'];

    protected $casts = [
        'ativo'     => 'boolean',
        'selos'     => 'array',
        'cores'     => 'array',
        'madalosso' => 'array',
    ];

    /**
     * Paleta padrão do design system GovSocial (tema dark).
     * Sobrescrita por seminário através da coluna `cores` (JSON).
     */
    public const PALETA_PADRAO = [
        'primary'      => '#0D3B7A',
        'primary900'   => '#061f43',
        'secondary'    => '#00C2FF',
        'secondary600' => '#00a3d6',
        'accent'       => '#FF6B35',
        'dark'         => '#0A0A14',
        'light'        => '#F4F6FA',
        'text'         => '#1C1C2E',
        'muted'        => '#6B7280',
    ];

    public function paleta(): array
    {
        return array_merge(self::PALETA_PADRAO, $this->cores ?? []);
    }

    // ── Relacionamentos ────────────────────────────────────────
    public function diferenciais(): HasMany
    {
        return $this->hasMany(SeminarioDiferencial::class)->orderBy('ordem');
    }

    public function vantagens(): HasMany
    {
        return $this->hasMany(SeminarioVantagem::class)->orderBy('ordem');
    }

    public function beneficios(): HasMany
    {
        return $this->hasMany(SeminarioBeneficio::class)->orderBy('ordem');
    }

    public function metodologias(): HasMany
    {
        return $this->hasMany(SeminarioMetodologia::class)->orderBy('ordem');
    }

    public function planos(): HasMany
    {
        return $this->hasMany(SeminarioPlano::class)->orderBy('ordem');
    }

    public function dias(): HasMany
    {
        return $this->hasMany(SeminarioDia::class)->orderBy('ordem');
    }

    public function publicos(): HasMany
    {
        return $this->hasMany(SeminarioPublico::class)->orderBy('ordem');
    }

    public function fotos(): HasMany
    {
        return $this->hasMany(SeminarioFoto::class)->orderBy('ordem');
    }

    public function palestrantes(): HasMany
    {
        return $this->hasMany(SeminarioPalestrante::class)->orderBy('ordem');
    }

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }

    // ── Route binding / scopes ─────────────────────────────────
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeAtivo($query)
    {
        return $query->where('ativo', true);
    }
}
