<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'user_id'];


    /* Relación 1:N inversa */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
