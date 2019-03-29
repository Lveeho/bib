@extends('layouts.admin')
@section('content')
    <h1>Users</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Voornaam</th>
            <th scope="col">Achternaam</th>
            <th scope="col">Email</th>
            <th scope="col">Rijksregisternummer</th>
            <th scope="col">Adres</th>
            <th scope="col">Rol</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)


            <tr>
                <td>{{$user->id}}
                    <button type="button" class="btn btn-secondary ml-2 text-primary">
                        <a href="{{route('users.edit',$user->id)}}">Edit</a>
                    </button>
                </td>
                <td>{{$user->user_firstname}}</td>
                <td>{{$user->user_lastname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->rijksnr}}</td>
                <td>{{$user->address_id}}</td>

                <td>@foreach($user->roles as $role)

                    {{$role->name}}
                @endforeach</td>

            </tr>
            @endforeach
        @endif
        </tbody>

    </table>
    <div class="row">
        <div class="col-12">
            {{$users->render()}}
        </div>
    </div>

@endsection
