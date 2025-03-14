<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(Request $request){
        $user = Admin::findOrFail(1);
        return view('admin.profile.edit', compact('user'));
    }
    
    public function update(Request $request){
        // dd($request->all());

        // Validate name and email
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $user = Admin::findOrFail(1);    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // Notification con Flasher Para que funcione tenemos que instalar ver en: https://php-flasher.io
        $message = __('Profile updated successfully');    
        flash()->success($message);

        return redirect()->route('admin.profile.edit')->with('status', 'profile-updated');
    }

}
