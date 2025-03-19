<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminNameEmailUpdateRequest;
use App\Http\Requests\Admin\PasswordUpdateRequest;
use App\Models\Admin;
use App\Models\AdminLogTime;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{

    use FileUpload;

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
                // palabra clave password la voy a utilizar en el view para seleccionar el tab correcto
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

    public function avatarUpdate(Request $request): RedirectResponse
    {
        // dd($request->all());
        // dd($request->avatar);

        $request->validate(
            [
                'avatar' => ['nullable', 'image', 'mimes:png,jpg', 'max:1024'],
            ],
            [
                // 'avatar.required' => __('The avatar is required.'),
                'avatar.image' => __('The avatar must be an image.'),
                'avatar.mimes' => __('The avatar must be a file of type: png, jpg.'),
                'avatar.max' => __('The avatar must not exceed 1MB.'),
            ]
        );

        $user = Admin::findOrFail(1);
        // dd($user->avatar);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');

            $avatarPath = $this->uploadFile($request->file('avatar'));
            $this->deleteFile($user->avatar);

            $user->avatar = $avatarPath;
            $user->save();  
        }else{
            $this->deleteFile($user->avatar);
            $user->avatar = null;
            $user->save();
        }

        // Notification con Flasher Para que funcione tenemos que instalar ver en: https://php-flasher.io
        $message = __('Avatar updated successfully');    
        flash()->success($message);

        // Usar with status para avisar a la vista que venimos de actualizar el avatar
        return redirect()->route('admin.profile.edit')->with('status', 'avatarUpdate');
    }

    public function actividades(Request $request){
        $adminActividades = AdminLogTime::all()->sortByDesc('id');
        return view('admin.actividades.index', compact('adminActividades'));
    }

    public function logoutPage(): View
    {
        return view('admin.logout.index');
    }


}
