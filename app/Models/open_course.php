<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class open_course extends Model
{
    protected $table='open_course';
    use HasFactory;
    protected $fillable=['id','student_id','student_name','course_name','course_id','student_state'];

    public function profile_student()
    {
        return $this->belongsTo('App\profile_student','student_id');
    }
    public function course()
    {
        return $this->belongsTo('App\course','course_id');
    }

}
