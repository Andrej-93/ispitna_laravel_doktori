<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    //
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
