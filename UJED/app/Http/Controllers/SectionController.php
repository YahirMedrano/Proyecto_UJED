<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Http\Requests\SectionRequest;
use App\Http\Requests\SectionUpdRequest;


class SectionController extends Controller
{
    public function index(){
        $sections = Section::all();
        return view('sectionsviews', compact('sections'));
    }
    
    public function save(SectionRequest $request){
        $sections = new Section;
        $sections->nombre = $request->nombre;
        $sections->disponibilidad = $request->disponibilidad;
        $sections->estate_id = $request->estate_id;
        $sections->save();
        return redirect('secciones');
    }

    public function edit($id){
        $sections = Section::find($id);
        return view('editar-seccion', compact('sections'));
    }

    public function update(SectionUpdRequest $request, $id){
        $sections = Section::find($id);
        $sections->nombre = $request->nombre;
        $sections->disponibilidad = $request->disponibilidad;
        $sections->estate_id = $request->estate_id;
        $sections->save();
        return redirect('secciones');
    }

    public function delete($id){
        Section::find($id)->delete();
        return redirect('secciones');
    }
}
