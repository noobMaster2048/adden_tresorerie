<?php

namespace App\Http\Controllers;

use App\PlanComptable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PlancomptableController extends Controller
{
    public function index()
    {
        return Inertia::render('Plan/Index', [
            'plans' => function() {
                return PlanComptable::all();
            }
        ]);
    }

    public function create()
    {
        return Inertia::render('Plan/Create');
    }

    public function edit($id)
    {
        $plan = PlanComptable::findOrFail($id);
        return Inertia::render('Plan/Edit', [
            'plan' => function() use($plan) {
                return $plan;
            }
        ]);
    }

    public function import()
    {
        return Inertia::render('Plan/Import');
    }

    public function store(Request $request)
    {
        $request->validate([
            'compte' => 'required',
            'libelle' => 'required'
        ]);

        PlanComptable::create([
            'num_compte' => $request->get('compte'),
            'libelle' => $request->get('libelle'),
        ]);

        return Redirect::route('plans')->with('success', 'Donnée enregistrée');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'compte' => 'required',
            'libelle' => 'required'
        ]);
        $plan = PlanComptable::findOrFail($id);
        $plan->update([
            'num_compte' => $request->get('compte'),
            'libelle' => $request->get('libelle'),
        ]);

        return Redirect::route('plans')->with('success', 'Donnée enregistrée');
    }

    public function supp($id)
    {
        $plan = PlanComptable::findOrFail($id);
        $plan->delete();
        return Redirect::route('plans')->with('error', 'Donnée supprimé');
    }
}
