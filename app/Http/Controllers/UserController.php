<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UserController extends Controller
{

    public function index()
    {
        return Inertia::render('User/Index', [
            'users' => function() {
                return User::all();
            }
        ]);
    }


    public function create()
    {
        return Inertia::render('User/Create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'login' => ['required'],
            'password' => ['required'],
            'nom' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')],
        ]);

        User::create([
            'login' => $request->get('login'),
            'nom' => $request->get('nom'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        return Redirect::route('users')->with('success', 'Les données ont été enregistré');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return Inertia::render('User/Edit', [
            'user' => function() use($user) {
                return $user;
            }
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'login' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['nullable'],
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'email' => $request->get('email'),
            'nom' => $request->get('nom'),
            'password' => Hash::make($request->get('password')),
        ]);

        return Redirect::route('users')->with('success', 'Les données ont été enregistré');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return Redirect::route('users')->with('error', 'Utilisateur supprimé');
    }
}
