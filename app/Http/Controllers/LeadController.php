<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Models\Lead;
use App\Models\Seminario;

class LeadController extends Controller
{
    /**
     * Recebe a inscrição enviada pela LP e grava como lead.
     */
    public function store(StoreLeadRequest $request, Seminario $seminario)
    {
        $lead = $seminario->leads()->create([
            'nome'     => $request->string('nome'),
            'email'    => $request->string('email'),
            'telefone' => $request->string('telefone'),
            'orgao'    => $request->string('orgao'),
            'cargo'    => $request->string('cargo'),
            'mensagem' => $request->string('mensagem'),
            'origem'   => $request->query('utm_source') ?? 'landing-page',
            'status'   => 'novo',
        ]);

        // (próximo passo) disparar e-mail/notificação aqui, se desejar.

        return redirect()
            ->route('seminarios.obrigado', $seminario)
            ->with('lead_nome', $lead->nome);
    }

    /**
     * Página de confirmação pós-inscrição.
     */
    public function obrigado(Seminario $seminario)
    {
        return view('seminarios.obrigado', [
            'seminario' => $seminario,
            'paleta'    => $seminario->paleta(),
            'nome'      => session('lead_nome'),
        ]);
    }
}
