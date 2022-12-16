<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'arrival_date','status','user_id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->first()->login;
    }
}
