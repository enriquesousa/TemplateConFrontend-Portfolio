<?php


/*

Las Funciones Globales las podemos mandar llamar de cualquier parte de la aplicación!

Funciones Globales
-----------------
Para que funcionen las funciones globales de Laravel
tenemos que agregar al autoload en composer.json
"autoload": {
    "psr-4": {
        ...
    },
    "files": [
        "app/Helpers/global_helpers.php"
    ]
}

Como le hicimos cambios a composer, tenemos que correr:
composer dump-autoload
o
composer du

*/


use App\Models\AdminLogTime;
use Illuminate\Support\Carbon;

// *************************
// *** GENERAL FUNCTIONS ***
// *************************

// grabarLoginTime
if (!function_exists('grabarLoginTime')) {
    function grabarLoginTime()
    {
        $user = auth('admin')->user();
        // dd($user->name);

        AdminLogTime::create([
            'user_id' => $user->id,
            'login_time' => now()
        ]);

        return true;
    }
}

// grabarLogout Time
if (!function_exists('grabarLogoutTime')) {
    function grabarLogoutTime()
    {
        $user = auth('admin')->user();
        // dd($user->id);

        // Encontrar la ultima sesión del usuario en tabla log_times
        $logTime = AdminLogTime::where('user_id', $user->id)->orderBy('id', 'desc')->first();
        // dd($logTime);

        $logTime->logout_time = now();
        $logTime->save();

        return true;
    }
}

// ******************************
// *** GENERAL DATE FUNCTIONS ***
// ******************************

// Para regresar tiempo transcurrido entre dos fechas: "11:06 AM | 20-Noviembre-2024".
if(!function_exists('intervaloTiempo')){
    function intervaloTiempo($fecha1, $fecha2)
    {
        // $login_time = $query->login_time;
        // $logout_time = $query->logout_time;

        $date1 = new DateTime($fecha1);
        if($fecha2 == null){
            $date2 = new DateTime($fecha1);            
        }else{
            $date2 = new DateTime($fecha2);
        }

        $interval = $date1->diff($date2);
        $time_interval = '';
        // Calcular el intervalo de tiempo entre login_time y logout_time
        // $date1 = new DateTime("2007-03-24");
        // $date2 = new DateTime("2009-06-26");
        // $interval = $date1->diff($date2);
        // $to = Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-5 3:30:34');
        // $from = Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-5 9:30:34');
        // $diff_in_hours = $to->diffInHours($from);

        if($fecha2 == null){
            $time_interval = '-';
        }else{
            $time_interval = $interval->format('%h hr., %i min.');
        }
        return $time_interval;
    }
}

// Para regresar una fecha en formato: "3:45 p.m. | 13-MAR-2024".
if(!function_exists('formatFecha5')){
    function formatFecha5($fecha)
    {
        $dia = Carbon::parse($fecha)->locale('es')->isoFormat('D');
        $mes = ucfirst(Carbon::parse($fecha)->locale('es')->isoFormat('MMMM'));
        $año = Carbon::parse($fecha)->locale('es')->isoFormat('YYYY');
        // $fecha = Carbon::parse($fecha)->locale('es')->isoFormat('D [de] MMMM[,] YYYY');

        // https://www.w3schools.com/php/func_date_date.asp
        $hora = date('g:i A', strtotime($fecha));

        $fecha = $hora . ' | '. $dia.'-'. $mes .'-' . $año;
        return $fecha;
    }
}


