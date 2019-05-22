@extends('layouts.admin')
@section('content')
    <h1 class="mb-3">Auteurs</h1>
    {!! Form::model($author,['method'=>'PATCH','action'=>['AuthorController@update',$author->id]]) !!}
    <div class="row">
        <div class="col-8">

            <div class="form-group">
                {!! Form::label('author_firstname','Voornaam:') !!}
                {!! Form::text('author_firstname',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('author_lastname','Achternaam:') !!}
                {!! Form::text('author_lastname',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Wijzig', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
@endsection

