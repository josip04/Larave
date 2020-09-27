<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = ['title','body','user_id','image'];

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function comments(){
        return $this->hasMany(Comments::class,'post_id');
    }

    public function getImageAttribute($value){
        return asset('storage/'.$value) ;
    }
}
