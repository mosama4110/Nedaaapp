<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $guarded = [];

    /*المرحلة التعليمية*/
    public function recip()
    {
    return $this->belongsTo(recipients::class,'recipients_id');
    }
      /* المدرسة*/
    public function school()
    {
    return $this->belongsTo(schools::class,'school_id');
    }
    /* الصف*/
  public function map_size()
  {
  return $this->belongsTo(map_sizes::class,'class_id');
  }
}
