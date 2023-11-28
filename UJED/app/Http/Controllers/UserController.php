<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdRequest;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{

    public function index($id){
        $user = User::find($id);
        return view('perfilviews', compact('user'));
    }
    
    public function save(UserRequest $request){
        $users = new User;
        $users->name = $request->name;
        $users->apellido_paterno = $request->apellido_paterno;
        $users->apellido_materno = $request->apellido_materno;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->password = Crypt::encryptString($request->password);
        $users->type = $request->type;
        $users->save();
        return redirect('usuarios');
    }

    public function edit($id){
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
        $user->save();
        return redirect('usuario/'.$user->id);
    }

    public function delete($id){
        User::find($id)->delete();
        return redirect('usuarios');
    }

}
