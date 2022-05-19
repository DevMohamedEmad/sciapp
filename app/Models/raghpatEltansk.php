<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class raghpatEltansk extends Model
{
    protected $table='raghpat_eltansks';
    use HasFactory;
    protected $fillable = [
      'student_id',
      'department_id',
      'sorting',
  ];
  public function profile(){
    return $this->belongsTo('App\Models\profile_student','student_id');
}

public function department(){
    return $this->belongsTo('App\Models\departments','department_id');
}




}
