<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Event;
use App\Http\Requests\ReservationRequest;
use App\Http\Requests\ReservationUpdRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Image;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Mail;
use App\mail\TicketEmail;



class ReservationController extends Controller
{
    public function index($id1){
        $event = Event::find($id1);
        return view('reservacionviews', compact('event'));
    }

    public function pagar($id2){
        cache::put('idEvent', $id2, now()->addMinutes(5));
        $event = Event::find($id2);
        return redirect($event->url_stripe);
    }

    public function exitosa($id){
        $reservation = Reservation::find($id);
        return view('reservacion-exitosa', compact('reservation'));
    }

    public function boletoproximo(){
        $idUsuarioLogueado = Auth::id();
        $reservaciones = Reservation::join('events','event_id','=','events.id')
        ->select('reservations.*')
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

    public function confirmar($id, $id2){
        $events = Event::find($id);
        $reservacion = $id2;
        return view('confirmacionviews', compact('events','reservacion'));
    }

    public function confirmacion($id){
        $reservacion = Reservation::find($id);
        $reservacion->asistencia = "Confirmada";
        $reservacion->save();
        return redirect('boletos-proximos');
    }

    public function generarYenviarboleto(){
        $html = view('boleto')->render();
        $pdf = PDF::loadHtml($html);
        $pdf->save(storage_path('app/public/mypdf.pdf'));
        return view('boleto');
    }

    public function save(){
        $reservations = new Reservation;
        $reservations->user_id = Auth::id();
        $reservations->event_id = cache::get('idEvent');
        $reservations->save();
        $reservationId = $reservations->id;
        $reservation = Reservation::find($reservationId);
        $pdf = PDF::loadView('boleto', ['reservation' => $reservation]);
        $pdfData = $pdf->output();

        Mail::to($reservation->user->email)->send(new TicketEmail($pdfData));
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
