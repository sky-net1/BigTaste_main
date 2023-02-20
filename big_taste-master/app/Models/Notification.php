<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title'];
    protected $hidden = ['user_id', 'updated_at'];

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
