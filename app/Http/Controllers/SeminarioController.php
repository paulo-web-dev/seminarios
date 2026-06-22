<?php

namespace App\Http\Controllers;

use App\Models\Seminario;
use Illuminate\Http\Request;

class SeminarioController extends Controller
{
    public function show(Request $request, Seminario $seminario)
    {
        abort_unless($seminario->ativo, 404);

        // Captura UTMs na sessão (campanhas de tráfego pago)
        $utm = array_filter($request->only([
            'utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term',
        ]));
        if (! empty($utm)) {
            session(['utm' => $utm]);
        }

        $seminario->load([
            'diferenciais',
            'vantagens',
            'beneficios',
            'metodologias',
            'planos',
            'dias',
            'publicos',
            'fotos',
            'palestrantes',
        ]);

        return view('seminarios.show', [
            'seminario' => $seminario,
            'paleta'    => $seminario->paleta(),
        ]);
    }

    public function home()
    {
        $seminario = Seminario::ativo()->latest()->first();
        abort_if(! $seminario, 404, 'Nenhum seminário ativo.');

        return redirect()->route('seminarios.show', $seminario);
    }
}
