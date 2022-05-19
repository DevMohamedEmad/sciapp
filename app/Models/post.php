<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=['id','user_id','title','slug','photo','content','created_at'];

    public function user(){
        return $this->belongsTo('App\user','user_id');
    }
    public function getFeaturedAttribute($photo)
    {
        return asset($photo);
    }
}
