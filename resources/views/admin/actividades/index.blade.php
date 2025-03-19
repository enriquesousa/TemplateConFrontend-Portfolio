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
        {{-- <div class="table-responsive"> --}}
        <div id="table-default" class="table-responsive">

            {{-- <table class="table table-vcenter card-table"> --}}
            {{-- <table id="table-default" class="table-responsive"> --}}
            <table class="table">
                

                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th><button class="table-sort" data-sort="sort-date">{{ __('Login Time') }}</button></th>
                        <th><button class="table-sort" data-sort="sort-date">{{ __('Logout Time') }}</button></th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Time in Session') }}</th>
                        <th>{{ __('Actions') }}</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>

                <tbody class="table-tbody">
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
                            <td class="sort-date" data-date="{{ $item->login_time }}">
                                {{ formatFecha5($item->login_time) }}
                            </td>

                            {{-- Logout Time --}}
                            <td class="sort-date" data-date="{{ $item->logout_time }}">
                                @if($item->logout_time == null)
                                    -
                                @else
                                    {{ formatFecha5($item->logout_time) }}
                                @endif
                            </td>

                            {{-- Description --}}
                            <td>
                                {{ $item->description }}
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