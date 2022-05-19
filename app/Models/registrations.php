<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registrations extends Model
{
    protected $table='registrations';
    use HasFactory;
    protected $fillable = [
        'id',
        'student_id ',
        'course_id ',
        ' course_name',
        ' hours',
        ' semester',
        'grade',
        ' grade_num',
        'final',
        'lecture',
        
  ];
  public function profile_student()
  {
    return $this->belongsTo('App\Models\profile_student','student_id');
   }
public function courseregister(){
    return $this->belongsTo('App\Models\courseregister','course_id');
}

}
