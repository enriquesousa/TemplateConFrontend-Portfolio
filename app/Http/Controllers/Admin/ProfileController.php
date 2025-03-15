<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminNameEmailUpdateRequest;
use App\Http\Requests\Admin\PasswordUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit(Request $request){
        $user = Admin::findOrFail(1);
        return view('admin.profile.edit', compact('user'));
    }
    
    public function update(AdminNameEmailUpdateRequest $request){
        // dd($request->all());

        $user = Admin::findOrFail(1);    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // Notification con Flasher Para que funcione tenemos que instalar ver en: https://php-flasher.io
        $message = __('Profile updated successfully');    
        flash()->success($message);

        return redirect()->route('admin.profile.edit')->with('status', 'profile-updated');
    }

    public function passwordUpdate(PasswordUpdateRequest $request){

        dd($request->all());
            
        $user = Admin::findOrFail(1);
        $user->password = Hash::make($request->password);
        $user->save();

        // Notification con Flasher Para que funcione tenemos que instalar ver en: https://php-flasher.io
        $message = __('Password updated successfully');    
        flash()->success($message);

        return redirect()->back();
    }



}
