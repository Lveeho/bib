@extends('layouts.admin')
@section('content')
    <h1 class="mb-3">Edit Book</h1>
    <hr>

    <div class="row">
        <div class="col-lg-6 pr-lg-5">
            {!! Form::model($book,['method'=>'PATCH','action'=>['BookController@update',$book->id],'files'=>true]) !!}
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
                {!! Form::select('author_id',$authors,null,['class'=>'form-control']) !!}
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
                {!! Form::label('photo_id','Photo:') !!}
                {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update Book', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-lg-6">
            <div class="row mt-5">
                <div class="col-12">
                    @if($book->barcodes)
                        @foreach($book->barcodes as $barcode)
                            <div class="row">
                                <div class="col-9">
                                    <div class="form-group">
                                        {!! Form::label('barcode','Barcode:') !!}
                                        {!! Form::text('barcode[]',$barcode->barcode,['class'=>'form-control'])!!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <div class="col-3 mt-4">
                                    {!! Form::open(['method'=>'DELETE', 'action'=>['BarcodeController@destroy',$barcode->id]])
                                 !!}
                                    {!! Form::button('<i class="fas fa-trash-alt"></i>',['class'=>'btn create text-danger btn-sm',
                                    'type'=>'submit']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        @endforeach
                        <div class="row">
                            <div class="col-9">
                                {!! Form::open(['method'=>'POST','action'=>'BarcodeController@store']) !!}
                                <div class="form-group">
                                    {!! Form::label('barcode','Barcode:') !!}
                                    {!! Form::text('barcode',null,['class'=>'form-control'])!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::hidden('id',$book->id,['class'=>'form-control'])!!}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group mt-4">
                                    {!! Form::button('<i class="fas fa-plus-circle"></i>',
                                    ['class'=>'btn create text-primary btn-sm','type'=>'submit']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-9">
                            @foreach ($pictures as $picture)
                                <div class="card p-5">
                                    <img src="{{$picture->getUrl()}}" class="card-img-top
                                    img-fluid"
                                         alt="...">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.form_error')
@stop
