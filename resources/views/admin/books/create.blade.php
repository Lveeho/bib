@extends('layouts.admin')
@section('content')
    <h1 class="mb-3">Boek aanmaken</h1>
    <hr>
    {!! Form::open(['method'=>'POST','action'=>'BookController@store','files'=>true]) !!}
    <div class="row">
        <div class="col-lg-6 pr-lg-5">
            <div class="form-group">
                {!! Form::label('ISBN','ISBN:') !!}
                {!! Form::text('ISBN',null,['class'=>'form-control','required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('booktitle','Boek titel:') !!}
                {!! Form::text('booktitle',null,['class'=>'form-control','required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('author_id','Auteur:') !!}
                {!! Form::select('author_id',$authors,null,['class'=>'form-control','required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('year','Jaar:') !!}
                {!! Form::text('year',null,['class'=>'form-control','required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('edition','Editie:') !!}
                {!! Form::text('edition',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description','Beschrijving:') !!}
                {!! Form::textarea('description',null,['class'=>'form-control','rows'=>3])!!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id','Foto:') !!}
                {!! Form::file('photo_id',null,['class'=>'form-control'])!!}
            </div>

        </div>
        <div class="col-lg-6">

            <div class="form-group">
                {!! Form::label('barcode','Barcode:') !!}
                {!! Form::text('barcode',null,['class'=>'form-control','required'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create Book', ['class' => 'btn btn-primary']) !!}
            </div>

        </div>

    </div>

    {!! Form::close() !!}

    @include('includes.form_error')
@stop

