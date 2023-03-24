<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index',['users' => $users]);
    }

    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->route('users.index')->with('message','user supprimé');
    }

    public function form_update(User $user)
    {
        return view('users.form_update', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom'=>'required',
            'email'=>'required',
            'date_naissance'=>'required',
            'mdp'=>['required', 'confirmed', Password::min(8)->numbers()->symbols()->mixedCase()],
        ]);

        /*if ($request->input('email') == NULL){
            return redirect()->back()->with('message','email obligatoire');
        }*/

        $user = User::find($id);
        $user->name =  $request->input('nom');
        $user->email = $request->input('email');
        $user->date_de_naissance = $request->input('date_naissance');
        $user->password =  Hash::make($request->input('mdp'));
        $user->save();

        return redirect()->route('users.index')->with('message','user modifié');
    }

    public function form_create(User $user)
    {
        return view('users.form_create', ['user' => $user]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nom'=>'required',
            'email'=>'required',
            'date_naissance'=>'required',
            'mdp'=>'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->input('nom'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('mdp')),
            'date_de_naissance' => $request->input('date_naissance'),
        ]);


        return redirect('/users')->with('message', 'user ajouté');
    }

}
