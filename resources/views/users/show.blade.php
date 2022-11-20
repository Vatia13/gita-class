@extends('app')
@section('content')
    <ul>
        @foreach ($user as $key => $item)
            @if (!is_array($item))
                <li>{{ $key }}: {{ $item }}</li>
            @endif
        @endforeach
    </ul>
@endsection
