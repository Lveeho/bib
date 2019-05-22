@extends('layouts.admin')
@section('content')
    <h1 class="mb-3">Boeken</h1>
    <hr>
    <div style="overflow-x:auto">
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th class="text-center" scope="col">Aantal</th>
                <th scope="col">ISBN</th>
                <th scope="col">Titel</th>
                <th scope="col">Auteur</th>
                <th scope="col">Jaar <small>(Editie)</small></th>
                <th scope="col">Beschrijving</th>
                {{--<th scope="col">Barcodes</th>--}}
                {{--<th scope="col">Foto</th>--}}

            </tr>
            </thead>
            <tbody>
            @if($books)
                @foreach($books as $book)
                    <tr class="table-row" data-toggle="tooltip" title="Wijzig" data-placement="left"
                        data-href="{{route('books.edit',$book->id)}}">
                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['BookController@destroy',$book->id]])
                                 !!}
                            {!! Form::button('<i class="fas fa-trash-alt"></i>',['class'=>'btn create text-dark btn-sm',
                            'type'=>'submit']) !!}
                            {!! Form::close() !!}


                        </td>

                        <td class="text-center"><?php $i=0;?>
                            @foreach($book->barcodes as $barcode)
                                @if($barcode->status == 1)
                                    <?php $i++ ?>
                                @endif
                            @endforeach
                            @if($i===0)
                                <span class="badge badge-danger py-2 " style="width: 40%">{{$i}}</span>
                            @elseif($i===1)
                                <span class="badge badge-warning py-2 " style="width: 40%">{{$i}}</span>
                            @else
                                {{$i}}
                            @endif
                        </td>

                        <td>{{$book->ISBN}}</td>
                        <td>{{Str::limit(($book->booktitle),40)}}</td>

                        <td>
                            @foreach($authors as $author)
                                @if($author->id===$book->author_id)
                                    {{$author->author_firstname[0].'.'.' '.$author->author_lastname}}
                                @endif
                            @endforeach
                        </td>
                        <td style="width:10%;position:relative">{{$book->year}}<span style="position:absolute;top:25%"
                                                                                     class="ml-1 badge badge-dark">{{$book->edition}}</span></td>
                        <td> {{Str::limit(($book->description),60)}}</td>

                        {{--<td>@foreach($book->barcodes as $barcode)
                                {{$barcode->barcode}} <br/>
                            @endforeach
                        </td>--}}
                        {{-- <td>{{$book->photo_id}}</td>--}}


                    </tr>
                @endforeach
            @endif
            </tbody>

        </table>
    </div>

    <div class="row">
        <div class="col-12">
            {{$books->render()}}
        </div>
    </div>

@endsection
