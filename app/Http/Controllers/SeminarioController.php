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
}
