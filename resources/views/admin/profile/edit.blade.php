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

                    {{-- defaults --}}
                    @php
                        $nameHeader = 'active';
                        $passwordHeader = '';
                        $avatarHeader = '';
                        $lenguajeHeader = '';
                    @endphp

                    @php
                        $estado = 'nameUpdate'; // por default
                    @endphp

                    {{-- If errors - Si hay errores en validation request entonces buscamos palabra clave en $errors --}}
                    {{-- si existe la palabra (nombre,contraseña,avatar o lenguaje) en $error entonces --}}
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            @php
                                if (Str::contains($error, __('password'))){
                                    $estado = 'passwordUpdate';
                                }elseif (Str::contains($error, __('name'))) {
                                    $estado = 'nameUpdate';
                                }elseif (Str::contains($error, __('avatar'))) {
                                    $estado = 'avatarUpdate';
                                }
                            @endphp
                        @endforeach
                    @endif
                    

                    @if(session('status') === 'nameUpdate' || $estado == 'nameUpdate')
                        @php
                            $nameHeader = 'active';
                            $passwordHeader = '';
                            $avatarHeader = '';
                            $lenguajeHeader = '';
                        @endphp
                    @endif

                    @if(session('status') === 'passwordUpdate' || $estado == 'passwordUpdate')
                        @php
                            $nameHeader = '';
                            $passwordHeader = 'active';
                            $avatarHeader = '';
                            $lenguajeHeader = '';
                        @endphp
                    @endif

                    @if(session('status') === 'avatarUpdate' || $estado == 'avatarUpdate')
                        @php
                            $nameHeader = '';
                            $passwordHeader = '';
                            $avatarHeader = 'active';
                            $lenguajeHeader = '';
                        @endphp
                    @endif

                    {{-- @php
                        dd($nameHeader, $passwordHeader, $avatarHeader, $lenguajeHeader);
                    @endphp --}}


                    {{-- Nombre y Correo Electrónico --}}
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-nombre" class="nav-link {{ $nameHeader }}" data-bs-toggle="tab" aria-selected="true" role="tab" style="">
                            <i class="bi bi-person"></i>&nbsp;
                            {{ __('Name and Email') }}
                        </a>
                    </li>

                    {{-- Contraseña --}}
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-contraseña" class="nav-link {{ $passwordHeader }}" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                            <i class="bi bi-key"></i>&nbsp;
                            {{ __('Password') }}
                        </a>
                    </li>

                    {{-- Avatar --}}
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-avatar" class="nav-link {{ $avatarHeader }}" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                            <i class="bi bi-person-circle"></i>&nbsp;
                            {{ __('Avatar') }}
                        </a>
                    </li>

                    {{-- Lenguaje --}}
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-lenguaje" class="nav-link {{ $lenguajeHeader }}" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                            <i class="bi bi-translate"></i>&nbsp;
                            {{ __('Language') }}
                        </a>
                    </li>

                </ul>
            </div>

            {{-- Tabs Contenido --}}
            <div class="card-body">
                <div class="tab-content">

                    {{-- defaults --}}
                    @php
                        $namePane = 'active';
                        $passwordPane = '';
                        $avatarPane = '';
                        $lenguajePane = '';
                    @endphp

                    @if(session('status') === 'nameUpdate' || $estado == 'nameUpdate')
                        @php
                            $namePane = 'active';
                            $passwordPane = '';
                            $avatarPane = '';
                            $lenguajePane = '';
                        @endphp
                    @endif

                    @if(session('status') === 'passwordUpdate' || $estado == 'passwordUpdate')
                        @php
                            $namePane = '';
                            $passwordPane = 'active';
                            $avatarPane = '';
                            $lenguajePane = '';
                        @endphp
                    @endif

                    @if(session('status') === 'avatarUpdate' || $estado == 'avatarUpdate')
                        @php
                            $namePane = '';
                            $passwordPane = '';
                            $avatarPane = 'active';
                            $lenguajePane = '';
                        @endphp
                    @endif

                    {{-- Nombre y Correo Electrónico --}}
                    <div class="tab-pane {{ $namePane }}" id="tabs-nombre" role="tabpanel">

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
                    <div class="tab-pane {{ $passwordPane }}" id="tabs-contraseña" role="tabpanel">
                        
                        <h3 class="card-title mt-4">{{ __('Change Password') }}</h3>
                        <p class="card-subtitle">{{ __('To change your administrator password, you first need to enter your current password to make the change.') }}</p>

                        <form action="{{ route('admin.profile.password.update') }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="row">

                                {{-- Contraseña Actual --}}
                                <div class="row g-3">                        
                                    <div class="col-md">
                                        <div class="form-label">{{ __('Current Password') }}</div>
                                        <input type="password" name="current_password" class="form-control"
                                        autocomplete="current-password">
                                        @if ($errors->has('current_password'))
                                            <span class="text-danger fs-6">{{ $errors->first('current_password') }}</span>
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
                                        @if ($errors->has('password'))
                                            <span class="text-danger fs-6">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>

                                    {{-- Confirmar Contraseña --}}
                                    <div class="col-md">
                                        <div class="form-label">{{ __('Confirm Password') }}</div>
                                        <input type="password" name="password_confirmation" class="form-control"
                                        autocomplete="new-password">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger fs-6">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>

                                </div>

                            </div>

                            {{-- Botón Actualizar Contraseña --}}
                            <br>
                            <div class="card-footer bg-transparent mt-auto">
                                <div class="btn-list justify-content-end">
                                    <button class="btn btn-primary">{{ __('Update Password') }}</button>
                                </div>
                            </div>

                        </form>

                    </div>

                    {{-- Avatar --}}
                    <div class="tab-pane {{ $avatarPane }}" id="tabs-avatar" role="tabpanel">
                        
                        <h3 class="card-title mt-4">{{ __('Avatar') }}</h3>
                        <p class="card-subtitle">{{ __('The avatar is a profile picture that represents you and will be used to identify your account.') }} - {{ __('PNG or JPG maximum of 400px by 400px and maximum of 1MB.') }}</p>

                        <form action="{{ route('admin.profile.avatar.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                        
                            <div class="row align-items-center">
    
                                {{-- Image --}}
                                <div class="col-auto">
                                    <div>
                                        {{-- @php
                                            dd($user->avatar);
                                        @endphp --}}
                                        <img id="showImage" src="{{ !empty($user->avatar) ? url($user->avatar) : url('images/avatar.png') }}" alt="avatar" class="avatar avatar-xl">
                                    </div>
                                    <div>
                                        @if ($errors->has('avatar'))
                                            <span class="text-danger fs-6">{{ $errors->first('avatar') }}</span>
                                        @endif
                                    </div>
                                </div>
    
                                <div class="col-auto">
                                    <div>
                                        <label for="image-upload" class="form-label btn btn-primary">{{ __('Change avatar') }}</label>
                                        <input type="file" id="image-upload" name="avatar" hidden=""> 
                                    </div>
                                </div>
    
                                <div class="col-auto">
                                    <a href="#" class="btn btn-ghost-danger eliminar-avatar">
                                        {{ __('Delete avatar') }}
                                    </a>
                                </div>
    
                            </div>
    
                            <br>
                            {{-- Botón Actualizar Avatar --}}
                            <div class="card-footer bg-transparent mt-auto">
                                <div class="btn-list justify-content-end">
                                    <button class="btn btn-primary">{{ __('Update Avatar') }}</button>
                                </div>
                            </div>

                        </form>

                    </div>

                    {{-- Lenguaje --}}
                    <div class="tab-pane {{ $lenguajePane }}" id="tabs-lenguaje" role="tabpanel">
                        
                        <h3 class="card-title mt-4">{{ __('Language') }}</h3>
                        <p class="card-subtitle">{{ __('Here you can change the language in which the application will be displayed.') }}  {{ __('Currently your language is: ') }} <span class="fw-bold text-yellow">{{ App::getLocale()== 'en' ? __('English') : __('Spanish')}}</span></p>
                        

                        <div class="row align-items-center">

                            <!-- Lenguaje - b5 dropdown -->
                            <div class="col-auto">
                                <div class="dropdown">
                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
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

                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

@endsection

@push('child-scripts')
    <script>
        $(document).ready(function() {
            
            // Mi JS para el manejo de la imagen en la forma
            $('#image-upload').change(function(e) {
                // alert("funciona");
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

            // Eliminar Avatar
            $(document).on('click', '.eliminar-avatar', function() {
                $('#showImage').attr('src', "{{ url('images/avatar.png') }}");
                $('#image-upload').val('');
            });

        });
    </script>
@endpush