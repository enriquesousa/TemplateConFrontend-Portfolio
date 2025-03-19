@extends('admin.layouts.master')
@section('content')

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">

        <div class="page page-center">
            <div class="container container-normal py-4">
                <div class="row align-items-center g-4">
                    <div class="col-lg">
                        <div class="container-tight">
                            <div class="text-center mb-4">
                                <a href="." class="navbar-brand navbar-brand-autodark">
                                    <img src="{{ asset('images/logo-small-TJweb-normal.svg') }}" width="100" height="100" alt="Tabler">
                                </a>
                            </div>
                            <div class="card card-md">
                                <div class="card-body">
                                    <h2 class="h2 text-center mb-4">{{ __('Logout') }}</h2>

                                    <form action="{{ route('admin.logout') }}" method="POST" autocomplete="off" novalidate>
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label">
                                                {{ __('Register your activity on this session') }} - ({{ __('Optional') }}) 
                                            <textarea class="form-control" name="description" rows="3" placeholder="{{ __('Describe your activity in this session') }}"></textarea>
                                        </div>

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-primary w-100">{{ __('Logout') }}</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg d-none d-lg-block">
                        <img src="{{ asset('admin/assets/static/illustrations/undraw_secure_login_pdn4.svg') }}" height="300"
                            class="d-block mx-auto" alt="">
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection