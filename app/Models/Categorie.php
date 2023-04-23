<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    //protected $fillable = ['id','category_title','content', 'category_image', 'parent', 'created_at', 'updated_at', 'deleted_at'];
    public function parents()
    {
        return $this->belongsTo(Categorie::class, 'parent');
    }

    public function services()
    {
        return $this->hasMany(Service::class);
        
    }
}
