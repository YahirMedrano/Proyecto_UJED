<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdRequest;
use App\Http\Requests\AddAdminRequest;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{

    public function index($id){
        $user = User::find($id);
        return view('perfilviews', compact('user'));
    }

    public function indexAll(){
        $users = User::all();
        return view('usersviews', compact('users'));
    }
    
    public function saveAdmin(AddAdminRequest $request){
        $user = User::find($request->id);
        $user->type = "Administrador";
        $user->save();
        return redirect('usuarios');
    }

    public function edit($id){
        $user = User::find($id);
        return view('editar-usuario', compact('user'));
    }

    public function editP($id){
        $user = User::find($id);
        return view('editar-perfil', compact('user'));
    }

    public function update(UserUpdRequest $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->apellido_paterno = $request->apellido_paterno;
        $user->apellido_materno = $request->apellido_materno;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->type = $request->type;
        $user->save();
        return redirect('usuarios');
    }

    public function updateP(UserUpdRequest $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->apellido_paterno = $request->apellido_paterno;
        $user->apellido_materno = $request->apellido_materno;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return redirect('usuario/'.$user->id);
    }

    public function delete($id){
        User::find($id)->delete();
        return redirect('usuarios');
    }

}
