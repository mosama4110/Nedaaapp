<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class school extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function school()
    {
    return $this->belongsTo(recipients::class,'recipients_id');
    }
}
