<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Jobs\EnviarLeadWebhook;
use App\Models\Seminario;
use Illuminate\Support\Str;

class LeadController extends Controller
{
    /**
     * Recebe a inscrição enviada pela LP, grava como lead e dispara o webhook.
     */
    public function store(StoreLeadRequest $request, Seminario $seminario)
    {
        // UTMs: do request (hidden) ou da sessão (capturadas no acesso à LP)
        $utmSessao = session('utm', []);
        $utm = [
            'utm_source'   => $request->input('utm_source')   ?: ($utmSessao['utm_source']   ?? null),
            'utm_medium'   => $request->input('utm_medium')   ?: ($utmSessao['utm_medium']   ?? null),
            'utm_campaign' => $request->input('utm_campaign') ?: ($utmSessao['utm_campaign'] ?? null),
            'utm_content'  => $request->input('utm_content')  ?: ($utmSessao['utm_content']  ?? null),
            'utm_term'     => $request->input('utm_term')     ?: ($utmSessao['utm_term']     ?? null),
        ];

        $contexto = [
            'ip'          => $request->ip(),
            'dispositivo' => $this->dispositivo($request->userAgent()),
            'user_agent'  => $request->userAgent(),
            'pagina_url'  => $request->input('pagina_url') ?: url()->previous(),
            'referer'     => $request->headers->get('referer'),
            'utm'         => array_filter($utm),
        ];

        $lead = $seminario->leads()->create([
            'nome'     => $request->string('nome'),
            'email'    => $request->string('email'),
            'telefone' => $request->string('telefone'),
            'orgao'    => $request->string('orgao'),
            'cargo'    => $request->string('cargo'),
            'mensagem' => $request->string('mensagem'),
            'origem'   => $utm['utm_source'] ?? 'landing-page',
            'status'   => 'novo',
            'extra'    => $contexto,
        ]);

        // Payload no formato esperado pelo fluxo do n8n
        $payload = [
            'Nome'              => $lead->nome,
            'E_mail'            => $lead->email,
            'WhatsApp'          => $lead->telefone,
            'Cargo_Setor'       => $lead->cargo,
            'Orgao_Municipio'   => $lead->orgao,
            'Mensagem'          => $lead->mensagem,
            'Seminario'         => $seminario->titulo,
            'Origem'            => $lead->origem,
            'Dispositivo'       => $contexto['dispositivo'],
            'URL'               => $contexto['pagina_url'],
            'Referral_Source'   => $contexto['referer'],
            'IP_do_usuario'     => $contexto['ip'],
            'Data_da_conversao' => optional($lead->created_at)->format('Y-m-d H:i:s'),
            'Id_do_formulario'  => 'seminarios-'.$lead->id,
            'UTM_Source'        => $utm['utm_source'],
            'UTM_Medium'        => $utm['utm_medium'],
            'UTM_Campaign'      => $utm['utm_campaign'],
            'UTM_Content'       => $utm['utm_content'],
            'UTM_Term'          => $utm['utm_term'],
        ];

        // Dispara após enviar a resposta — não atrasa o "obrigado" do usuário.
        EnviarLeadWebhook::dispatchAfterResponse($payload);

        return redirect()
            ->route('seminarios.obrigado', $seminario)
            ->with('lead_nome', $lead->nome);
    }

    public function obrigado(Seminario $seminario)
    {
        return view('seminarios.obrigado', [
            'seminario' => $seminario,
            'paleta'    => $seminario->paleta(),
            'nome'      => session('lead_nome'),
        ]);
    }

    private function dispositivo(?string $ua): string
    {
        $ua = strtolower((string) $ua);
        return Str::contains($ua, ['mobile', 'android', 'iphone', 'ipad'])
            ? 'Mobile' : 'Desktop';
    }
}
