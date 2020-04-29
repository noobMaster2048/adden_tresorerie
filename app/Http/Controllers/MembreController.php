<?php

namespace App\Http\Controllers;

use App\Membre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class MembreController extends Controller
{
    public function index()
    {
        return Inertia::render('Membre/Index', [
            'membres' => function() {
                return Membre::all();
            }
        ]);
    }

    public function create()
    {
        return Inertia::render('Membre/Create', [
            'type_membres' => function() {
                return Membre::typeMembre();
            },
            'civilites' => function() {
                return Membre::civilites();
            }
        ]);
    }

    public function edit($id)
    {
        $membre = Membre::findOrFail($id);
        return Inertia::render('Membre/Edit', [
            'membre' => function() use($membre) {
                return $membre;
            },
            'type_membres' => function() {
                return Membre::typeMembre();
            },
            'civilites' => function() {
                return Membre::civilites();
            }
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required'],
            'prenom' => ['required'],
            'type_membre' => ['required'],
            'date_naissance' => ['required'],
            'telephone' => ['required'],
        ]);

        Membre::create([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'date_naissance' => $request->get('date_naissance'),
            'cni' => $request->get('cni'),
            'telephone' => $request->get('telephone'),
            'civilite' => $request->get('civilite'),
            'type_membre' => $request->get('type_membre'),
        ]);

        return Redirect::route('membres')->with('success', 'le membre a été crée avec succès');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => ['required'],
            'prenom' => ['required'],
            'type_membre' => ['required'],
            'date_naissance' => ['required'],
            'telephone' => ['required'],
        ]);

        $membre = Membre::findOrFail($id);

        $membre->update([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'date_naissance' => $request->get('date_naissance'),
            'cni' => $request->get('cni'),
            'telephone' => $request->get('telephone'),
            'civilite' => $request->get('civilite'),
            'type_membre' => $request->get('type_membre'),
        ]);

        return Redirect::route('membres')->with('success', 'le membre a été modifié avec succès');
    }

    public function supp($id)
    {
        $membre = Membre::findOrFail($id);
        $membre->delete();
        return Redirect::route('membres')->with('error', 'le membre a été supprimé avec succès');
    }
}
