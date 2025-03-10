<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'places_nbr',
        'event_id',
        'type'
    ];

    public function event(){
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

}
