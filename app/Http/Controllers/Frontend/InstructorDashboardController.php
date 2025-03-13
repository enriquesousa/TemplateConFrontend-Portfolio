<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorDashboardController extends Controller
{
    public function index(Request $request){
        
        // return "Instructor Dashboard";

        return view('instructor-dashboard');
    }


    // Código temporal para poder hacer logout de un user puede ser user o instructor
    public function salir(Request $request): RedirectResponse 
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
