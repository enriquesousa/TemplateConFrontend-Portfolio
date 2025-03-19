<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// LogTime para llevar un registro de las horas en el sistema solo para la tabla admins
class AdminLogTime extends Model
{
    protected $guarded = [];

    // Relación user_id con id de Admin
    public function user()
    {
        return $this->belongsTo(Admin::class);
    }

}
