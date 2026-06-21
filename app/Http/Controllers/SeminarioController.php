<?php

namespace App\Http\Controllers;

use App\Models\Seminario;

class SeminarioController extends Controller
{
    /**
     * Landing page de um seminário (resolvido pelo slug).
     * Ex.: /seminarios/gestao-midias-sociais-setor-publico
     */
    public function show(Seminario $seminario)
    {
        abort_unless($seminario->ativo, 404);

        $seminario->load([
            'diferenciais',
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

    /**
     * Atalho opcional: a home redireciona para o seminário em destaque.
     * (Configurável depois — ver routes/web.php)
     */
    public function home()
    {
        $seminario = Seminario::ativo()->latest()->first();

        abort_if(! $seminario, 404, 'Nenhum seminário ativo.');

        return redirect()->route('seminarios.show', $seminario);
    }
}
