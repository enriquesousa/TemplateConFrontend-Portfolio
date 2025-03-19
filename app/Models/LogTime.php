<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// LogTime para llevar un registro de las horas en el sistema solo para la tabla users
class LogTime extends Model
{
    protected $guarded = [];

    // Relación con user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con Admin User
    // public function admin()
    // {
    //     return $this->belongsTo(Admin::class);
    // }

}
