@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm alert alert-danger space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
