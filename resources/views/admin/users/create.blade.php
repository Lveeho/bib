@extends('layouts.admin')
@section('content')
    <h1>Create User</h1>
    {!! Form::open(['method'=>'POST','action'=>['UsersController@store']]) !!}
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
            {{--<div class="form-group">
                {!! Form::label('role_id','Role:') !!}
                {!! Form::select('role_id',[''=>'Choose options'] + $roles,null,['class'=>'form-control']) !!}
            </div>--}}
            <div class="form-group">
                {!! Form::label('password','Password:') !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::submit('Create User', ['class' => 'btn btn-primary col-md-3']) !!}
            </div>
            {!! Form::close() !!}
            @include('includes.form_error')
        </div>

        {{--{!! Form::close() !!}
        {!! Form::open(['method'=>'CREATE', 'action'=>['AdminUsersController@create',$user->id]]) !!}--}}
        {{--<div class="form-group">
            {!! Form::submit('Create User',['class'=>'btn btn-danger col-md-3']) !!}
        </div>--}}

    <!--hier staat nog iets verkeerd!-->

    </div>

@stop

