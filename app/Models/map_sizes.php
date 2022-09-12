<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class map_sizes extends Model
{
    use HasFactory;
    protected $fillable = [
        'mapsizes_name',
        'description',
        'recipients_id',

    ];

    public function section()
    {
    return $this->belongsTo(recipients::class,'recipients_id');
    }
}
