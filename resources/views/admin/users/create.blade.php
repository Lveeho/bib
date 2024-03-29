@extends('layouts.admin')
@section('content')
    <h1 class="mb-3">Create User</h1>
    <hr>
    {!! Form::open(['method'=>'POST','action'=>['UsersController@store']]) !!}
    <div class="row">
        <div class="col-lg-6 pr-lg-5">
            <div class="form-group">
                {!! Form::label('user_firstname','Voornaam:') !!}
                {!! Form::text('user_firstname',null,['class'=>'form-control','required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('user_lastname','Achternaam:') !!}
                {!! Form::text('user_lastname',null,['class'=>'form-control','required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','E-mail:') !!}
                {!! Form::text('email',null,['class'=>'form-control','required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('rijksnr','Rijksregisternummer:') !!}
                {!! Form::text('rijksnr',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password','Password:') !!}
                {!! Form::password('password',['class'=>'form-control','required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('status','Status:') !!}
                {!! Form::select('status',array(1=>'Actief',0=>'Non-actief'),null,['class'=>'form-control','required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id','Nieuwe rol toewijzen:') !!}
                {!! Form::select('role_id',array(2=>'Ontlener',1=>'Admin'),null,['class'=>'form-control','required']) !!}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('street','Straat:') !!}
                {!! Form::text('street',null,['class'=>'form-control','required'])
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
                {!! Form::text('postalcode',null,['class'=>'form-control','required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('country','Land:') !!}
                {!! Form::text('country',null,['class'=>'form-control','required']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Opslaan', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

        </div>


        @include('includes.form_error')

    </div>

@stop

