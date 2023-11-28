<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;
use App\Mail\AlertEvent;

class EmailController extends Controller
{
    public function index(){
        Mail::to("yir.futbol@gmail.com")->send(new AlertEvent());
        return view('home');
    }
}
