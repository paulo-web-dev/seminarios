<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EnviarLeadWebhook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $backoff = 10;

    public function __construct(public array $payload)
    {
    }

    public function handle(): void
    {
        $url = config('services.leads_webhook.url');
        if (! $url) {
            return; // webhook não configurado — ignora silenciosamente
        }

        try {
            $req = Http::timeout(10)->acceptJson();

            if ($token = config('services.leads_webhook.token')) {
                $req = $req->withHeaders([
                    'Authorization' => 'Bearer '.$token,
                    'great-auth'    => $token,
                ]);
            }

            $resp = $req->post($url, $this->payload);

            if ($resp->failed()) {
                Log::warning('Lead webhook respondeu com erro', [
                    'status' => $resp->status(),
                    'body'   => mb_substr($resp->body(), 0, 500),
                ]);
            }
        } catch (\Throwable $e) {
            Log::warning('Falha ao enviar lead ao webhook: '.$e->getMessage());
        }
    }
}
