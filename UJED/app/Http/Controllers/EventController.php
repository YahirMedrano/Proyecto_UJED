<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EventRequest;
use App\Http\Requests\EventUpdRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EventController extends Controller
{
    public function inicio()
    {
        $events = Event::orderBy('id', 'ASC')->get()->take(4);
        return view('index', compact('events'));
    }

    public function index(){
        $events = Event::all();
        return view('eventsviews', compact('events'));
    }

    public function detalle($id){
        $events = Event::find($id);
        return view('eventsdetails', compact('events'));
    }
    
    public function save(EventRequest $request){
        $file = $request->file('imagen');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public', $filename);
       
        $events = new Event;
        $events->nombre = $request->nombre;
        $events->descripcion = $request->descripcion;
        $events->imagen = $filename;
        $events->precio = $request->precio;
        $events->fecha_inicio = $request->fecha_inicio;
        $events->fecha_fin = $request->fecha_fin;
        $events->duracion = $request->duracion;
        $events->expiracion = "Proximo";
        $events->estate_id = $request->estate_id;
        $events->save();
        // Generar y guardar el código QR
        $events->qr_code = $this->generateQRCode($events->id);
        $events->save();
        return redirect('eventos');
    }

    public function edit($id){
        $events = Event::find($id);
        return view('editar-evento', compact('events'));
    }

    public function update(EventUpdRequest $request, $id){
        $events = Event::find($id);

        if($request->hasfile('imagen')){
            Storage::disk('public')->delete($events->imagen);
            $file = $request->file('imagen');   
            $filename = $file->getClientOriginalName();
            $file->storeAs('public', $filename);            
        }
        else{
            $filename = $events->imagen;
        }

        $events->nombre = $request->nombre;
        $events->descripcion = $request->descripcion;
        $events->imagen = $filename;
        $events->precio = $request->precio;
        $events->fecha_inicio = $request->fecha_inicio;
        $events->fecha_fin = $request->fecha_fin;
        $events->duracion = $request->duracion;
        $events->save();
        return redirect('eventos');
    }

    public function delete($id){
        Event::find($id)->delete();
        return redirect('eventos');
    }

    private function generateQRCode($id)
    {
        $qrCode = QrCode::format('svg')->size(300)->generate("confirmar-asistencia/{$id}");
        $path = 'qrcodes/'.$id.'.svg';
        Storage::disk('public')->put($path, $qrCode);

        return $path;
    }

}
