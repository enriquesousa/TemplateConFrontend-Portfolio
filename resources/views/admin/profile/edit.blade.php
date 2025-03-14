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

        {{-- Card con Tabs --}}
        <div class="card">

            {{-- Tabs Encabezados --}}
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">

                    {{-- Nombre y Correo Electrónico --}}
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-nombre" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab" style="">
                            <i class="bi bi-person"></i>&nbsp;
                            {{ __('Name and Email') }}
                        </a>
                    </li>

                    {{-- Contraseña --}}
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-contraseña" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                            <i class="bi bi-key"></i>&nbsp;
                            {{ __('Password') }}
                        </a>
                    </li>

                    {{-- Avatar --}}
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-avatar" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                            <i class="bi bi-person-circle"></i>&nbsp;
                            {{ __('Avatar') }}
                        </a>
                    </li>

                    {{-- Lenguaje --}}
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-lenguaje" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                            <i class="bi bi-translate"></i>&nbsp;
                            {{ __('Language') }}
                        </a>
                    </li>

                </ul>
            </div>

            {{-- Tabs Contenido --}}
            <div class="card-body">
                <div class="tab-content">

                    {{-- Nombre y Correo Electrónico --}}
                    <div class="tab-pane active show" id="tabs-nombre" role="tabpanel">

                        {{-- Editar nombre y correo --}}
                        <h3 class="card-title mt-4">{{ __('Name and Email') }}</h3>
                        <p class="card-subtitle">{{ __('Your email address can be used to reset your password and also to receive messages from this application.') }}</p>
                        
                        <form action="{{ route('admin.profile.update') }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="row g-3">

                                {{-- Nombre --}}
                                <div class="col-md">
                                    <div class="form-label">{{ __('Name') }}</div>
                                    {{-- <input type="text" name="name" class="form-control" placeholder="{{ __('Complete Name') }}"> --}}
                                    <input type="text" name="name" class="form-control" placeholder="{{ __('Complete Name') }}" value="{{ old('name', $user->name) }}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger fs-6">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
    
                                {{-- Correo Electrónico --}}
                                <div class="col-md">
                                    <div class="form-label">{{ __('Email') }}</div>
                                    {{-- <input type="text" class="form-control" placeholder="test@example.com" value=""> --}}
                                    <input type="email" name="email" id="email" class="form-control" placeholder="test@example.com" value="{{ old('email', $user->email) }}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger fs-6">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
    
                            </div>
                            <br>
                            {{-- Botón Guardar Cambios --}}
                            <div class="card-footer bg-transparent mt-auto">
                                <div class="btn-list justify-content-end">
                                    <button class="btn btn-primary">{{ __('Save Changes') }}</button>
                                </div>
                            </div>

                        </form>
                        
                    </div>

                    {{-- Contraseña --}}
                    <div class="tab-pane" id="tabs-contraseña" role="tabpanel">
                        
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

                        <br>

                        {{-- Botón Actualizar Contraseña --}}
                        <div class="card-footer bg-transparent mt-auto">
                            <div class="btn-list justify-content-end">
                                <a href="#" class="btn btn-primary">
                                    {{ __('Update Password') }}
                                </a>
                            </div>
                        </div>

                    </div>

                    {{-- Avatar --}}
                    <div class="tab-pane" id="tabs-avatar" role="tabpanel">
                        
                        <h3 class="card-title mt-4">{{ __('Avatar') }}</h3>
                        <p class="card-subtitle">{{ __('The avatar is a profile picture that represents you and will be used to identify your account.') }}</p>

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

                        </div>

                        <br>

                        {{-- Botón Actualizar Avatar --}}
                        <div class="card-footer bg-transparent mt-auto">
                            <div class="btn-list justify-content-end">
                                <a href="#" class="btn btn-primary">
                                    {{ __('Update Avatar') }}
                                </a>
                            </div>
                        </div>

                    </div>

                    {{-- Lenguaje --}}
                    <div class="tab-pane" id="tabs-lenguaje" role="tabpanel">
                        
                        <h3 class="card-title mt-4">{{ __('Language') }}</h3>
                        <p class="card-subtitle">{{ __('Here you can change the language in which the application will be displayed.') }}</p>

                        <div class="row align-items-center">

                            <!-- Lenguaje - b5 dropdown -->
                            <div class="col-auto">
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
                                <br>
                            </div>

                            {{-- Botón Actualizar Lenguaje --}}
                            <div class="card-footer bg-transparent mt-auto">
                                <div class="btn-list justify-content-end">
                                    <a href="#" class="btn btn-primary">
                                        {{ __('Update Language') }}
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

@endsection
