@extends('admin.layouts.master')
@section('content')

<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    {{ __('Edit Profile') }}
                </h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">

        {{-- Editar Perfil - Avatar, Nombre y Correo Electrónico --}}
        <div class="card">
            <div class="row g-0">
                <div class="col-12 col-md-12 d-flex flex-column">
                    <div class="card-body">
                        <h2 class="mb-4">{{ __('My Account') }}</h2>
                        <h3 class="card-title">{{ __('Profile Details') }}</h3>

                        <div class="row align-items-center">

                            <div class="col-auto"><span class="avatar avatar-xl"
                                    style="background-image: url(./static/avatars/000m.jpg)"></span>
                            </div>

                            <div class="col-auto">
                                <a href="#" class="btn">
                                    {{ __('Change avatar') }}
                                </a>
                            </div>

                            <div class="col-auto">
                                <a href="#" class="btn btn-ghost-danger">
                                    {{ __('Delete avatar') }}
                                </a>
                            </div>

                            <div class="col-auto">
                                <!-- Lenguaje - b5 dropdown -->
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ __('Prefer language') }}
                                    </a>
                                    
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        
                                        {{-- Ingles --}}
                                        <li>
                                            <a class="dropdown-item" href="{{ url('locale/en') }}">
                                                {{ __('English') }}
                                                @if (App::getLocale() == 'en')
                                                    <i class="bi bi-check2"></i>
                                                @endif
                                            </a>
                                        </li>
    
                                        {{-- Español --}}
                                        <li>
                                            <a class="dropdown-item" href="{{ url('locale/es') }}">
                                                {{ __('Spanish') }}
                                                @if (App::getLocale() == 'es')
                                                    <i class="bi bi-check2"></i>
                                                @endif
                                            </a>
                                        </li>
    
                                    </ul>
                                </div>
                            </div>

                        </div>

                        {{-- Nombre y Rol --}}
                        <h3 class="card-title mt-4">{{ __('Profile Information') }}</h3>
                        <div class="row g-3">

                            {{-- Nombre --}}
                            <div class="col-md">
                                <div class="form-label">{{ __('Name') }}</div>
                                <input type="text" class="form-control">
                            </div>

                            {{-- Rol --}}
                            <div class="col-md">
                                <div class="form-label">{{ __('Role') }}</div>
                                <input type="text" class="form-control" value="admin" readonly>
                            </div>
                        </div>

                        {{-- Correo Electrónico --}}
                        <h3 class="card-title mt-4">{{ __('Email') }}</h3>
                        <p class="card-subtitle">{{ __('Your email address can be used to reset your password and also to receive messages from this application.') }}</p>
                        <div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="{{ __('Email') }}" value="">
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="card-footer bg-transparent mt-auto">
                        <div class="btn-list justify-content-end">
                            <a href="#" class="btn btn-primary">
                                {{ __('Save Changes') }}
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- Editar Admin Password --}}
        <div class="card mt-4">
            <div class="row g-0">
                <div class="col-12 col-md-12 d-flex flex-column">
                    <div class="card-body">
                        <h2 class="mb-4">{{ __('My Password') }}</h2>

                        <h3 class="card-title mt-4">{{ __('Change Password') }}</h3>
                        <p class="card-subtitle">{{ __('To change your administrator password, you first need to enter your current password to make the change.') }}</p>

                        <div class="row">

                            {{-- Contraseña Actual --}}
                            <div class="row g-3">                        
                                <div class="col-md">
                                    <div class="form-label">{{ __('Current Password') }}</div>
                                    <input type="password" name="current_password" class="form-control"
                                    autocomplete="current-password">
                                    @if ($errors->updatePassword->has('current_password'))
                                        <code>{{ $errors->updatePassword->first('current_password') }}</code>
                                    @endif
                                </div>
                            </div>

                            {{-- New password and Confirm password --}}
                            <div class="row g-3">                        

                                {{-- Nueva Contraseña --}}
                                <div class="col-md">
                                    <div class="form-label">{{ __('New Password') }}</div>
                                    <input type="password" name="password" class="form-control"
                                    autocomplete="new-password">
                                    @if ($errors->updatePassword->has('password'))
                                        <code>{{ $errors->updatePassword->first('password') }}</code>
                                    @endif
                                </div>

                                {{-- Confirmar Contraseña --}}
                                <div class="col-md">
                                    <div class="form-label">{{ __('Confirm Password') }}</div>
                                    <input type="password" name="password_confirmation" class="form-control"
                                    autocomplete="new-password">
                                    @if ($errors->updatePassword->has('password_confirmation'))
                                        <code>{{ $errors->updatePassword->first('password_confirmation') }}</code>
                                    @endif
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="card-footer bg-transparent mt-auto">
                        <div class="btn-list justify-content-end">
                            <a href="#" class="btn btn-primary">
                                {{ __('Update Password') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
