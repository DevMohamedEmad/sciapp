<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class courseregister extends Model
{
    use HasFactory;
    use softDeletes;

    protected $dates=['deleted_at'];

    protected $fillable = [
        'id',
      'semester',
      'course_name',
      'course_dep',
      'final',
      'lecture',
      'instractor_name',


  ];
  public function course()
  {
      return $this->belongsTo('App\Models\Course','id');
  }
}
