<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class QRCodeController extends Controller
{
    public function confirmAttendance($id)
    {
        // Busca el evento por ID
        $event = Event::findOrFail($id);

        return view('attendance.confirm', compact('event'));
    }
}
