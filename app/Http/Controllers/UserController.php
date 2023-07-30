<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    
    public function create()
    {
        return view('users.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
    
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    
        return redirect()->route('users.index')->with('success','Usuario creado exitosamente.');
    }
    
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }
    
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'sometimes|min:8',
        ]);
    
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
    
        return redirect()->route('users.index')->with('success','Usuario actualizado exitosamente.');
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','Usuario eliminado exitosamente.');
    }
    
}
