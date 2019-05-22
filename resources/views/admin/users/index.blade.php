@extends('layouts.admin')
@section('content')


    <h1 class="mb-3">Users</h1>
    <hr>
    <table class="table table-striped mt-2">
        <thead>
        <tr class="bg-white">
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

            @if ($user->status===0)
            <tr class="table-row text-muted" data-toggle="tooltip" title="Wijzig" data-placement="right"
                    data-href="{{route('users.edit',$user->id)}}" style="background-color:#edeff2;">

                <td>{{$user->user_firstname}}</td>
                <td>{{$user->user_lastname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->rijksnr}}</td>
                <td>{{$user->address->street}}
                    {{$user->address->nr}}
                    {{$user->address->busnr}}
                    {{$user->address->postalcode}}
                    {{$user->address->country}}
                </td>
                <td>
                    @foreach($user->roles as $role)
                    {{$role->name}}
                @endforeach
                </td>
            </tr>
                @else
                <tr class="table-row" data-toggle="tooltip" title="Wijzig" data-placement="right"
                    data-href="{{route('users.edit',$user->id)}}">

                    <td>{{$user->user_firstname}}</td>
                    <td>{{$user->user_lastname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->rijksnr}}</td>
                    <td>{{$user->address->street}}
                        {{$user->address->nr}}
                        {{$user->address->busnr}}
                        {{$user->address->postalcode}}
                        {{$user->address->country}}
                    </td>
                    <td>
                        @foreach($user->roles as $role)
                            {{$role->name}}
                        @endforeach
                    </td>
                </tr>
            @endif
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
