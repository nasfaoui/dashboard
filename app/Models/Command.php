<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'service_id', 'user_id', 'status', 'created_at', 'updated_at', 'deleted_at'];

    public function services()
    {
        return $this->belongsTo(Service::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $table = 'commande';

}
