<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ticket_id',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function ticket(){
        return $this->belongsTo(Ticket::class, 'ticket_id', 'id');
    }
}
