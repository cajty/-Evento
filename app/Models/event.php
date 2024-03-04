<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'description',
        'date',
        'location',
        'places',
        'user_id',
        'catg_id',
    ];
    public function Category()
    {
        return $this->belongsTo(Category::class, 'catg_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
