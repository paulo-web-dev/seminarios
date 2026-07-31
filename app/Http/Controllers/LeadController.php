<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Jobs\EnviarLeadWebhook;
use App\Models\Seminario;
use Illuminate\Support\Str;

class LeadController extends Controller
{
    /**
     * Recebe a inscrição da LP (/govsocial), grava o lead e dispara o webhook.
     */
    public function store(StoreLeadRequest $request)
    {
        // Slug do seminário vem do campo oculto da LP (fallback: GovSocial).
        $slug = (string) ($request->input('seminario_slug') ?: 'gestao-midias-sociais-setor-publico');
        $seminario = $this->resolveSeminario($slug);

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

        EnviarLeadWebhook::dispatchAfterResponse($payload);

        return redirect()
            ->route($this->obrigadoRoute($slug))
            ->with('lead_nome', $lead->nome);
    }

    /**
     * Página de obrigado. Descobre o seminário pela rota chamada
     * (govsocial.obrigado ou financas.obrigado) e mostra a view correspondente.
     */
    public function obrigado(\Illuminate\Http\Request $request)
    {
        $rota = optional($request->route())->getName();

        // financas → view/paleta dourada; qualquer outra → GovSocial (comportamento original).
        if ($rota === 'financas.obrigado') {
            $seminario  = Seminario::where('slug', 'financas-municipais')->first();
            $paletaOuro = [
                'primary' => '#7A5518', 'primary900' => '#1A1207',
                'secondary' => '#F2A016', 'secondary600' => '#DF7C0B',
                'accent' => '#E1913A', 'dark' => '#141109',
                'light' => '#F6EEE1', 'text' => '#241B0E', 'muted' => '#8A7B62',
            ];

            return view('seminarios.financas-obrigado', [
                'seminario' => $seminario,
                'paleta'    => $seminario ? $seminario->paleta() : $paletaOuro,
                'nome'      => session('lead_nome'),
            ]);
        }

        $seminario = $this->resolveSeminario('gestao-midias-sociais-setor-publico');

        return view('seminarios.obrigado', [
            'seminario' => $seminario,
            'paleta'    => $seminario->paleta(),
            'nome'      => session('lead_nome'),
        ]);
    }

    /**
     * Resolve um seminário por slug, com fallback no mais recente.
     */
    private function resolveSeminario(string $slug): Seminario
    {
        return Seminario::where('slug', $slug)->first()
            ?? Seminario::query()->latest()->firstOrFail();
    }

    /**
     * Mapeia o slug do seminário para a rota de "obrigado" correspondente.
     */
    private function obrigadoRoute(string $slug): string
    {
        return [
            'financas-municipais' => 'financas.obrigado',
        ][$slug] ?? 'govsocial.obrigado';
    }

    private function dispositivo(?string $ua): string
    {
        $ua = strtolower((string) $ua);
        return Str::contains($ua, ['mobile', 'android', 'iphone', 'ipad'])
            ? 'Mobile' : 'Desktop';
    }
}
