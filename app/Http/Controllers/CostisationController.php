<?php

namespace App\Http\Controllers;

use App\Cotisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CostisationController extends Controller
{

    public function index()
    {
       return Inertia::render('Cotisation/Index', [
           'cotisations' => function() {
            return Cotisation::all();
           }
       ]);
    }


    public function create()
    {
       return Inertia::render('Cotisation/Create', [
           'periodes' => function() {
                return Cotisation::periodes();
           },
           'type_cotisations' => function() {
                return Cotisation::type_cotisations();
           }
       ]);
    }


    public function store(Request $request)
    {
       $request->validate([
           'libelle' => ['required'],
           'montant' => ['required'],
           'periode' => ['required'],
           'date_cotisation' => ['required'],
       ]);

       Cotisation::create([
           'libelle' => $request->get('libelle'),
           'montant' => $request->get('montant'),
           'date_cotisation' => $request->get('date_cotisation'),
           'periode' => $request->get('periode'),
       ]);

       return Redirect::route('cotisations')->with('success', 'Donnée enregistrée');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
       $item = Cotisation::findOrFail($id);
       return Inertia::render('Cotisation/Edit', [
           'cotisation' => function() use($item) {
                return $item;
           },
           'periodes' => function() {
               return Cotisation::periodes();
           },
           'type_cotisations' => function() {
               return Cotisation::type_cotisations();
           }
       ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => ['required'],
            'montant' => ['required'],
            'periode' => ['required'],
            'date_cotisation' => ['required'],
        ]);

        $item = Cotisation::findOrFail($id);
        $item->update([
            'libelle' => $request->get('libelle'),
            'montant' => $request->get('montant'),
            'date_cotisation' => $request->get('date_cotisation'),
            'periode' => $request->get('periode'),
        ]);

        return Redirect::route('cotisations')->with('success', 'Donnée enregistrée');
    }


    public function destroy($id)
    {
        //
    }
}
