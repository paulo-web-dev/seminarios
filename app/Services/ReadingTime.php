<?php

namespace App\Services;

/**
 * Calcula o tempo de leitura (em minutos) de um conteúdo HTML.
 * Base: ~200 palavras por minuto (média de leitura em português).
 */
class ReadingTime
{
    public const WORDS_PER_MINUTE = 200;

    public static function minutes(string $html): int
    {
        $text = trim(preg_replace('/\s+/', ' ', strip_tags($html)));
        if ($text === '') {
            return 1;
        }
        $words = count(preg_split('/\s+/', $text));
        return max(1, (int) ceil($words / self::WORDS_PER_MINUTE));
    }
}
