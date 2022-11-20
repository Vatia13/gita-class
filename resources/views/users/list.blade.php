@extends('app')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Errors</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $key=>$user)
                <tr>
                    <th scope="row">{{ $user['id'] }}</th>
                    <td>{{ $user['username'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ json_encode($user['address']) }}</td>
                    <td style="color:red">
                        @if (count($user['errors']))
                            {!! json_encode($user['errors']) !!}
                        @endif
                    </td>
                    <td>
                        <x-show-more :url="route('users.show', $user['id'])" />
                    </td>
                </tr>
            @empty
                <tr colspan="3">No countries found.</tr>
            @endforelse
        </tbody>
    </table>
@endsection
