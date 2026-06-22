<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public array $statuses = ['novo', 'contatado', 'inscrito', 'descartado'];

    public function index(Request $request)
    {
        $status = $request->query('status');
        $q      = trim((string) $request->query('q'));

        $leads = Lead::with('seminario')
            ->latest()
            ->when($status, fn ($query) => $query->where('status', $status))
            ->when($q !== '', function ($query) use ($q) {
                $query->where(function ($w) use ($q) {
                    $w->where('nome', 'like', "%{$q}%")
                      ->orWhere('email', 'like', "%{$q}%")
                      ->orWhere('orgao', 'like', "%{$q}%")
                      ->orWhere('telefone', 'like', "%{$q}%");
                });
            })
            ->paginate(20)
            ->withQueryString();

        $counts = Lead::selectRaw('status, COUNT(*) as c')
            ->groupBy('status')
            ->pluck('c', 'status');

        $total = Lead::count();

        return view('admin.leads.index', compact('leads', 'status', 'q', 'counts', 'total'));
    }

    public function show(Lead $lead)
    {
        $lead->load('seminario');
        return view('admin.leads.show', compact('lead'));
    }

    public function updateStatus(Request $request, Lead $lead)
    {
        $data = $request->validate([
            'status' => ['required', 'in:'.implode(',', $this->statuses)],
        ]);

        $lead->update($data);

        return back()->with('ok', 'Status atualizado.');
    }
}
