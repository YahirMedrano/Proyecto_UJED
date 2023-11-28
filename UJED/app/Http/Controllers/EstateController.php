<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estate;
use App\Http\Requests\EstateRequest;
use App\Http\Requests\EstateUpdRequest;

class EstateController extends Controller
{
    public function index(){
        $estates = Estate::all();
        return view('estatesviews', compact('estates'));
    }
    
    public function save(EstateRequest $request){
        $estates = new Estate;
        $estates->nombre = $request->nombre;
        $estates->direccion = $request->direccion;
        $estates->disponibilidad = "Disponible";
        $estates->save();
        return redirect('inmuebles');
    }

    public function edit($id){
        $estates = Estate::find($id);
        return view('editar-inmueble', compact('estates'));
    }

    public function update(EstateUpdRequest $request, $id){
        $estates = Estate::find($id);
        $estates->nombre = $request->nombre;
        $estates->direccion = $request->direccion;
        $estates->save();
        return redirect('inmuebles');
    }

    public function delete($id){
        Estate::find($id)->delete();
        return redirect('inmuebles');
    }
}
