@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'list-unstyled']) }}>
        @foreach ((array) $messages as $message)
            <li class="text-danger" style="font-size: 12px">{{ $message }}</li>
        @endforeach
    </ul>
@endif
