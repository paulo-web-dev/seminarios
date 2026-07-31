<?php

namespace App\Http\Controllers;

use App\Models\Seminario;
use Illuminate\Http\Request;

class SeminarioController extends Controller
{
    /**
     * Landing GovSocial — view 100% estática, servida em /govsocial.
     */
    public function govsocial(Request $request)
    {
        // Captura UTMs de campanha na sessão (usadas no lead/webhook).
        $utm = array_filter($request->only([
            'utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term',
        ]));
        if (! empty($utm)) {
            session(['utm' => $utm]);
        }

        return view('seminarios.show');
    }

    /**
     * Landing Finanças Municipais — view estática, servida em /financas-municipais.
     * A paleta dourada é resolvida do banco quando o seminário existe (coluna `cores`);
     * caso contrário, usa o fallback dourado abaixo, de modo que a página renderize
     * mesmo antes de rodar o seeder.
     */
    public function financas(Request $request)
    {
        $utm = array_filter($request->only([
            'utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term',
        ]));
        if (! empty($utm)) {
            session(['utm' => $utm]);
        }

        $seminario = Seminario::where('slug', 'financas-municipais')->first();

        $paletaOuro = [
            'primary'      => '#7A5518',
            'primary900'   => '#1A1207',
            'secondary'    => '#F2A016',
            'secondary600' => '#DF7C0B',
            'accent'       => '#E1913A',
            'dark'         => '#141109',
            'light'        => '#F6EEE1',
            'text'         => '#241B0E',
            'muted'        => '#8A7B62',
        ];

        return view('seminarios.financas', [
            'seminario' => $seminario,
            'paleta'    => $seminario ? $seminario->paleta() : $paletaOuro,
        ]);
    }
}
