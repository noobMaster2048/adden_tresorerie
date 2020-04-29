<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AcceuilController extends Controller
{
    public function index()
    {
        return Inertia::render('Acceuil/Index');
    }
}
