<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function Event(){
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function Section(){
        return $this->belongsTo(Section::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
