<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $fillable=['id','course_name','course_dep','course_require','course_type','instractor_name','description','hours'];

    public function courseregister()
    {
        return $this->hasOne('App\Models\courseregister');
    }

}
