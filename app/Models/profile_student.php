<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile_student extends Model
{
    protected $table='profile_student';
    use HasFactory;
    protected $fillable = [
        'id',
      'user_id',
      'student_name',
      'level',
      'hours',
      'cgpa',
      'major',
      'minor'
  ];
  public function user(){
      return $this->belongsTo('App\user','id');
  }

  public function raghpatEltansk()
  {
      return $this->hasOne('App\Models\raghpatEltansk');
  }





}
