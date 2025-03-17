<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminNameEmailUpdateRequest;
use App\Http\Requests\Admin\PasswordUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function edit(Request $request){
        $user = Admin::findOrFail(1);
        return view('admin.profile.edit', compact('user'));
    }
    
    public function update(AdminNameEmailUpdateRequest $request){
        // dd($request->all());

        $request->session()->put('tabSelection', 'namedUpdate');
        session()->save();

        $user = Admin::findOrFail(1);    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // Notification con Flasher Para que funcione tenemos que instalar ver en: https://php-flasher.io
        $message = __('Profile updated successfully');    
        flash()->success($message);

        return redirect()->route('admin.profile.edit')->with('status', 'nameUpdate');
    }

    public function passwordUpdate(Request $request): RedirectResponse
    {

        // dd($request->all());

        $request->validate(
            [
                'current_password' => ['required', 'current_password:admin'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'current_password.required' => __('The current password is required.'),
                'password.required' => __('The password is required.'),
                'password.min' => __('The password must be at least 8 characters.'),
                'password.confirmed' => __('The password confirmation does not match.'),
            ]
        );
        
            
        $user = Admin::findOrFail(1);
        // dd($request->password);

        $user->password = Hash::make($request->password);
        $user->save();

        // Notification con Flasher Para que funcione tenemos que instalar ver en: https://php-flasher.io
        $message = __('Password updated successfully');    
        flash()->success($message);

        // Usar with status para avisar a la vista que venimos de actualizar el password
        return redirect()->route('admin.profile.edit')->with('status', 'passwordUpdate');

    }



}
