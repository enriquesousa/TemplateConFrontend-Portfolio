@extends('admin.layouts.master')
@section('content')

<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    {{ __('Log Activities') }}
                </h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table table-vcenter card-table">

                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Admin') }}</th>
                        <th>{{ __('Login Time') }}</th>
                        <th>{{ __('Logout Time') }}</th>
                        <th>{{ __('Time in Session') }}</th>
                        <th>{{ __('Actions') }}</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($adminActividades as $item)
                        <tr>

                            {{-- ID --}}
                            <td>
                                {{ $item->id }}
                            </td>

                            {{-- Admin Name --}}
                            <td>
                                {{ $item->user->name }}
                            </td>

                            {{-- Login Time --}}
                            <td>
                                {{ formatFecha5($item->login_time) }}
                            </td>

                            {{-- Logout Time --}}
                            <td>
                                @if($item->logout_time == null)
                                    -
                                @else
                                    {{ formatFecha5($item->logout_time) }}
                                @endif
                            </td>

                            {{-- Time in Session --}}
                            <td>
                                {{ intervaloTiempo($item->login_time, $item->logout_time) }}
                            </td>


                            {{-- Acciones --}}
                            <td>
                                
                            </td>

                        </tr>
                    @empty
                        <tr class="text-center" colspan="7">
                            {{-- {{ __('No data available in table') }} --}}
                            <td>{{ __('No data available in table') }}</td>
                            {{-- {{ __('No data available in table') }} --}}
                        </tr>
                    @endforelse
                    
                </tbody>
                
            </table>

            {{-- If adminActividades links exists --}}
            {{-- @if ($adminActividades->links())
                <tfoot>
                    <tr>
                        <td colspan="7">
                            {{ $adminActividades->links() }}
                        </td>
                    </tr>
                </tfoot>
            @endif --}}
            

        </div>

    </div>
</div>

@endsection