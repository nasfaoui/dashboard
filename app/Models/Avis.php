<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;
    protected $fillable = ['id','user_id', 'service_id', 'rating'];

    public function user()
    {
        return $this->belongsTo(User::class); 
    }
    public function service()
    {
        return $this->belongsTo(Service::class); 
    }
}
