<!doctype html>

<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />

        {{-- Nuestro Propio CSRF Token --}}
        <meta name="csrf_token" content="{{ csrf_token() }}" />

        <title>{{ __('Admin Panel') }}</title>

        {{-- Plugin Notyf CSS para JavaScript lo usamos en Ajax --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

        <!-- CSS files -->
        <link href="{{ asset('admin/assets/dist/css/tabler.min.css?1692870487') }}" rel="stylesheet" />
        <link href="{{ asset('admin/assets/dist/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet" />

        {{-- Tabler Icons --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">

        {{-- <link href="{{ asset('admin/assets/dist/css/tabler-payments.min.css?1692870487') }}" rel="stylesheet" />
        <link href="{{ asset('admin/assets/dist/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet" /> --}}
        <link href="{{ asset('admin/assets/dist/css/demo.min.css?1692870487') }}" rel="stylesheet" />

        <style>
            @import url('https://rsms.me/inter/inter.css');

            :root {
                --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
            }

            body {
                font-feature-settings: "cv03", "cv04", "cv11";
            }
        </style>

        <!-- Bootstrap Icons fonts -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        {{-- Custom css y js--}}
        @vite(['resources/css/admin.css', 'resources/js/admin/admin.js'])

    </head>

    <body>
        <script src="{{ asset('admin/assets/dist/js/demo-theme.min.js?1692870487') }}"></script>

        <div class="page">

            <!-- Sidebar -->
            @include('admin.layouts.sidebar')

            <!-- Header Navbar -->
            @include('admin.layouts.header')

            <!-- Page wrapper CONTENIDO -->
            <div class="page-wrapper">

                <!-- Page content -->
                @yield('content')

                <!-- Page  Footer -->
                @include('admin.layouts.footer')

            </div>

        </div>
        

        <!-- ******* -->
        <!-- Modales -->
        <!-- ******* -->
        {{-- Modal Eliminar --}}
        <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>
                <h3>Estas seguro?</h3>
                <div class="text-secondary">Estas seguro que deseas eliminar este registro, este proceso no se puede revertir.</div>
                </div>
                <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                    <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                        Cancelar
                        </a></div>
                    <div class="col"><a href="#" class="btn btn-danger eliminar-confirmar w-100">
                        Eliminar
                        </a></div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- ******* -->
        <!-- Libs JS -->
        <!-- ******* -->
        
        <!--jquery library js-->
        {{-- <script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js') }}"></script> --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <!-- Plugin Notyf JavaScript lo usamos en Ajax -->
        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

        
        <!-- ******* -->
        <!-- Tabler Core -->
        <!-- ******* -->
        <script src="{{ asset('admin/assets/dist/js/tabler.min.js?1692870487') }}" defer></script>
        <script src="{{ asset('admin/assets/dist/js/demo.min.js?1692870487') }}" defer></script>
       
        {{-- Para el código JS de las vistas, se puedan ejecutar cuando los llamamos con @push('child-scripts') --}}
        @stack('child-scripts')


    </body>

</html>
