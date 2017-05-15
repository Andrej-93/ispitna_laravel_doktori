<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    public function appointments()
    {
        return $this->hasMany(Appointments::class);
    }
}
