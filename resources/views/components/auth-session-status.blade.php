@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'text-sm alert alert-success']) }}>
        {{ $status }}
    </div>
@endif

{{-- @props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
        {{ $status }}
    </div>
@endif --}}
