<?php

namespace App\Http\Controllers;

use App\Cotisation;
use App\Membre;
use App\Versement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class VersementController extends Controller
{
    public function index()
    {
        return Inertia::render('Versement/Index', [
            'versements' => function() {
                return Versement::all();
            }
        ]);
    }

    public function create()
    {
        return Inertia::render('Versement/Create', [
            'membres' => function() {
                return Membre::select(['id', 'nom', 'prenom'])->get();
            },
            'cotisations' => function() {
                return Cotisation::select(['id', 'libelle'])->get();
            }
        ]);
    }

    public function edit($id)
    {
        $versement = Versement::findOrFail($id);
        return Inertia::render('Versement/Create', [
            'membres' => function() {
                return Membre::select(['id', 'nom', 'prenom'])->get();
            },
            'versement' => function() use($versement) {
                return $versement;
            },
            'cotisations' => function() {
                return Cotisation::select(['id', 'libelle'])->get();
            }
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_versement' => ['required'],
            'membre' => ['required'],
            'montant' => ['required'],
            'cotisation' => ['required'],
        ]);

        Versement::create([
            'date_versement' => $request->get('date_versement'),
            'membre_id' => $request->get('membre'),
            'montant' => $request->get('montant'),
            'cotisation_id' => $request->get('cotisation'),
        ]);

        return Redirect::route('versements')->with('success', 'versement éffectué');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date_versement' => ['required'],
            'membre' => ['required'],
            'montant' => ['required'],
            'cotisation' => ['required'],
        ]);

        $versement = Versement::findOrFail($id);

        $versement->update([
            'date_versement' => $request->get('date_versement'),
            'membre_id' => $request->get('membre'),
            'montant' => $request->get('montant'),
        ]);

        return Redirect::route('versements')->with('success', 'versement modifié');
    }
}
