@extends('layouts.admin')
@section('content')
    <h1>Edit User</h1>



    {!! Form::model($user,['method'=>'PATCH','action'=>['UsersController@update',$user->id]]) !!}

    <div class="row">
        <div class="col-6">
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
            <div class="form-group">
                {!! Form::label('status','Status:') !!}
                {!! Form::select('status',array(1=>'Actief',0=>'Non-actief'),null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id','Nieuwe rol toewijzen:') !!}
                {!! Form::select('role_id',[''=>'Choose options'] + $roles,null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User', ['class' => 'btn btn-primary col-md-3']) !!}
            </div>
            {!! Form::close() !!}



            {!! Form::open(['method'=>'DELETE', 'action'=>['UsersController@destroy',$user->id]])
             !!}
            <div class="form-group">
                {!! Form::label('role_id','Bestaande rol verwijderen:') !!}
                {!! Form::select('role_id',[''=>'Choose options'] + $roles,null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Delete Role',['class'=>'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}

        </div>
        <div class="col-6">
            <table class="table table-light w-25 mt-4 bg-inverse-dark ">
                <thead>
                <tr><th>Huidige rol(len):</th></tr>
                </thead>
                <tbody>
                @foreach($user->roles as $role)
                    <tr><td>{{$role->name}}</td></tr>
                @endforeach
                </tbody>
            </table>

            <div class="row">
                <div class="col mt-3">
                    {!! Form::model($address,['method'=>'PATCH','action'=>['UsersController@update',$user->id]])
                     !!}
                    <div class="form-group">
                        {!! Form::label('street','Straat:') !!}
                        {!! Form::text('street',null,['class'=>'form-control'])
                         !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('nr','Nr:') !!}
                        {!! Form::text('nr',null,['class'=>'form-control'])
                         !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('busnr','Busnr:') !!}
                        {!! Form::text('busnr',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('postalcode','Postcode:') !!}
                        {!! Form::text('postalcode',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('country','Land:') !!}
                        {!! Form::text('country',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Update Address', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>

    </div>

    <div class="row">

    </div>
    @include('includes.form_error')
@stop
