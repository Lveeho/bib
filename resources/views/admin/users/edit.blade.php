@extends('layouts.admin')
@section('content')
    <h1>Edit User</h1>



    {!! Form::model($user,['method'=>'PATCH','action'=>['UsersController@update',$user->id]]) !!}

    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                {!! Form::label('user_firstname','Voornaam:') !!}
                {!! Form::text('user_firstname',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('user_lastname','Achternaam:') !!}
                {!! Form::text('user_lastname',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','E-mail:') !!}
                {!! Form::text('email',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('rijksnr','Rijksregisternummer:') !!}
                {!! Form::text('rijksnr',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password','Password:') !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>
                        Rollen
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>@foreach($user->roles as $role)
                            {{$role->name}}
                        @endforeach
                    </td>
                </tr>
                </tbody>
            </table>


            <div class="form-group">
                {!! Form::label('role_id','Role:') !!}
                {!! Form::select('role_id',[''=>'Choose options'] + $roles,null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User', ['class' => 'btn btn-primary col-md-3']) !!}
            </div>
        </div>

        {!! Form::close() !!}
        {{--{!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy',$user->id]]) !!}--}}


    </div>
    @include('includes.form_error')
@stop
