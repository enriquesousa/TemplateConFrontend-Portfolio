<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        //App::setLocale($locale); // There is no need for this here, as the middleware will run after the redirect() where it has already been set.
        $request->session()->put('locale', $locale);
        session()->save();

        return redirect()->back();
    }
}
