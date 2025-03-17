<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class PasswordUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = 1;
        // $user = Admin::find(auth()->guard('admin')->user()->id);
        $user = Admin::find($id);
        $userName = $user->name;
        // dd($userName);

        // Put session variable
        session()->put('tabSelection', 'passwordUpdate');
        session()->save();

        return [
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'current_password' => ['required', 'string',],


            // 'current_password' => ['required', 'current_password:admin'],

            // 'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
            //                             if (! Hash::check($value, $user->password)) {
            //                                 $fail(__('The current password is incorrect.'));
            //                             }
            //                         }],

            'password' => ['required', Password ::defaults(), 'confirmed'],

            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                                        if (! Hash::check($value, $user->password)) {
                                            return $fail(__('The current password is incorrect.'));
                                        }
                                    }],


        ];
    }


    // Add Success message for current password validation
    // public function messages()
    // {
    //     return [
    //         'estado' => 'password-update',
    //     ];
    // }


    // Add message for current password validation
    // public function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json([
    //         'success' => false,
    //         'message' => 'Validation errors',
    //         'data' => $validator->errors()
    //     ], 422));
    // }

    // public function withValidator($validator)
    // {
    //     $validator->after(function ($validator) {
    //         $validator->errors()->add('estado', 'password-update');
    //     });
        
    // }
    

}
