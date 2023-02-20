<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'body'];

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d M');
    }

 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
