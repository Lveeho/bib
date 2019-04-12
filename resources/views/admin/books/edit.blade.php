@extends('layouts.admin')
@section('content')
    <h1>Edit Book</h1>
    {!! Form::model($book,['method'=>'PATCH','action'=>['BookController@update',$book->id],'files'=>true]) !!}
    <div class="row">
        <div class="col-6">
            <h2 class="display-5 mt-3">Global Bookdata</h2>

            <div class="form-group">
                {!! Form::label('ISBN','ISBN:') !!}
                {!! Form::text('ISBN',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('booktitle','Boek titel:') !!}
                {!! Form::text('booktitle',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('author_id','Auteur:') !!}
                {!! Form::text('author_id',null,['class'=>'form-control']) !!}
                {{--{!! Form::select('author_id',[''=>'Choose options']  ,null,['class'=>'form-control']) !!}--}}
            </div>
            <div class="form-group">
                {!! Form::label('year','Jaar:') !!}
                {!! Form::text('year',null,['class'=>'form-control']) !!}
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
                {!! Form::submit('Update Book', ['class' => 'btn btn-primary col-md-3']) !!}
            </div>
        </div>
        <div class="col-6">
            <h2 class="display-5 mt-3">Existing Barcodes</h2>
            <div class="row">
                <div class="col-8">
                    @if($book->barcodes)
                        @foreach($book->barcodes as $barcode)
                            <div class="form-group">
                                {!! Form::label('barcode','Barcode:') !!}
                                {!! Form::text('barcode[]',$barcode->barcode,['class'=>'form-control'])!!}
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-4">
                    <p>deletes</p>
                </div>

            </div>
            <div class="row">
                <img class=img-responsive" src="{{url('public/images/'.$book->photo_id)}}"
                     alt="">
                <div class="form-group">
                    {!! Form::label('photo_id','Photo:') !!}
                    {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
                </div>
            </div>


        </div>
    </div>
    {!! Form::close() !!}

    @include('includes.form_error')
@stop
