<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocalizationController extends Controller
{
    public function setLanguage(Request $request, string $locale)
    {
        // dd($locale); // es | en

        if ( $locale == 'es' ) {
            $locale = 'es';            
        }
        
        if( $locale == 'en' ) {
            $locale = 'en';
        }

        // dd($locale);

        // Save selected Locale to current "Session"
        // $locale = $request->locale ?? 'en';
        // dd($locale);
        
        // dd(Auth::guard('admin')->check());

        // Si admin esta login, grabamos el locale en campo language en la tabla admins
        if(Auth::guard('admin')->check()) {
            // Grabar en el campo language en la tabla admins
            $user = Admin::findOrFail(1);
            $user->language = $locale;
            $user->save();
            // Flash message
            $message = __('Language updated successfully');    
            flash()->success($message);
        }

        //App::setLocale($locale); // There is no need for this here, as the middleware will run after the redirect() where it has already been set.
        $request->session()->put('locale', $locale);
        session()->save();

        return redirect()->back();
    }
}
