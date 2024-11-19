<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function __construct()
    {
    $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar el usuario
        $user = User::findOrFail($id);

        if(!$request->state){
            $user->update(['state' => $request->state]);
        }else{
            $user->update($request->all());
        }
        return redirect()->route('users.index')->with('success', 'User Update OK');
    }

    // public function destroy(Request $request, $id)
    // {
    //     // Lógica para actualizar el usuario
    //     $user = User::findOrFail($id);
        

    //     return redirect()->route('users.index')->with('success', 'Estate Update OK');
    // }

    // public function destroy($id)
    // {
    //     // Lógica para inactivar el usuario (soft delete o eliminar directamente)
    //     $user = User::findOrFail($id);
    //     $user->delete();

    //     return redirect()->route('users.index')->with('success', 'User Delete Update OK');
    // }
}