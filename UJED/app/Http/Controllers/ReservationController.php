<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Event;
use App\Http\Requests\ReservationRequest;
use App\Http\Requests\ReservationUpdRequest;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Facades\View;
use PDF;

class ReservationController extends Controller
{
    public function index(ReservationRequest $request, $id1){
        $event = Event::find($id1);
        $cantidad = $request->cantidad;
        return view('reservacionviews', compact('event', 'cantidad'));
    }

    public function exitosa($id){
        $reservation = Reservation::find($id);
        return view('reservacion-exitosa', compact('reservation'));
    }

    public function boletoproximo(){
        $idUsuarioLogueado = Auth::id();
        $reservaciones = Reservation::join('events','event_id','=','events.id')
        ->where('user_id', $idUsuarioLogueado)
        ->where('events.expiracion','=','Proximo')
        ->get();
        return view('boletosviews', compact('reservaciones'));
    }

    public function boletopasado(){
        $idUsuarioLogueado = Auth::id();
        $reservaciones = Reservation::join('events','event_id','=','events.id')
        ->where('user_id', $idUsuarioLogueado)
        ->where('events.expiracion','=','Pasado')
        ->get();
        return view('boletospasadosviews', compact('reservaciones'));
    }

    public function confirmar($id){
        $events = Event::find($id);
        return view('confirmacionviews', compact('events'));
    }

    public function generarYenviarboleto(){
        $html = view('boleto')->render();
        $pdf = PDF::loadHTML($html);
        $pdf->save(storage_path('app/public/mi_pdf.pdf'));
        return view('boleto');
    }

    private function crearImagenBoleto()
    {
        // Lógica para crear el boleto como una imagen usando Intervention Image
        $img = Image::canvas(600, 400, '#ffffff'); // Ejemplo: una imagen en blanco de 600x400 píxeles
        $img->text('Mi Evento', 300, 200, function ($font) {
            $font->size(24);
            $font->color('#000000');
            $font->align('center');
            $font->valign('center');
        });

        return $img;
    }

    public function save($id1,$id2,$id3){
        $reservations = new Reservation;
        $reservations->cantidad = $id3;
        $reservations->user_id = $id1;
        $reservations->event_id = $id2;
        $reservations->save();
        return redirect('reservacion-exitosa/'.$reservations->id);
    }

    /*public function edit($id){
        $reservations = Reservation::find($id);
        return view('editar-reservacion', compact('reservations'));
    }

    public function update(ReservationRequest $request, $id){
        $reservations = Reservation::find($id);
        $reservations->user = $request->name;
        $reservations->key_name = $request->key_name;
        $reservations->description = $request->description;
        $reservations->save();
        return redirect('reservaciones');
    }*/

    public function delete($id){
        Reservation::find($id)->delete();
        return redirect('reservaciones');
    }
}
