@extends('layouts.admin')
@section('content')
    <h1 class="mb-3">Auteurs</h1>
    <hr>
    <div style="overflow-x:auto">
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th scope="col">Voornaam</th>
                <th scope="col">Achternaam</th>
            </tr>
            </thead>
            <tbody>
            @if($authors)
                @foreach($authors as $author)
                    <tr class="table-row" data-toggle="tooltip" title="Wijzig" data-placement="left"
                        data-href="{{route('authors.edit',$author->id)}}">
                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['AuthorController@destroy',$author->id]])
                                 !!}
                            {!! Form::button('<i class="fas fa-trash-alt"></i>',['class'=>'btn create text-dark btn-sm',
                            'type'=>'submit']) !!}
                            {!! Form::close() !!}
                        </td>
                        <td>{{$author->author_firstname}}</td>
                        <td>{{$author->author_lastname}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-12">
            {{$authors->render()}}
        </div>
    </div>
@endsection
