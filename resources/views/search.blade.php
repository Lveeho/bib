@extends('welcome')
@section('search')
<div class="row">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <div class="col-12">
        <h1 class="text-center" >Zoek<i class="fas fa-search text-muted ml-3"></i></h1>
    </div>

    <div class="col-lg-10 offset-lg-1 my-3" >
        <div class="bg-light mb-5 ml-3">
            <form action="{{action('FrontController@searchAuthor')}}" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control my-4 ml-4" name="q"
                           placeholder="Zoek op auteur"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                    <input type="text" class="form-control my-4" name="p"
                           placeholder="Zoek op boektitel"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                    <input type="text" class="form-control my-4" name="z"
                           placeholder="Zoek op beschrijving"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <div class="row mb-5" style="position:absolute">
            <div class="col-12">
                @if(isset($details))
                    <p> De zoekresultaten voor "<b> {{ $query }} </b>" zijn:</p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Voornaam</th>
                            <th>Achternaam</th>
                            <th>Boektitels</th>
                            <th>Jaar</th>
                            <th>Editie</th>
                            <th>Beschrijving</th>
                            <th>Beschikbaar</th>
                            @if($user=auth()->user())
                                <th></th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($details as $author)
                            @if(!empty($author))
                                @foreach($books as $book)
                                    @if($book->author_id===$author->id)
                                        <tr>
                                            <td>{!! $author->author_firstname !!}</td>
                                            <td>{!! $author->author_lastname!!}</td>
                                            <td>{{$book->booktitle}} </td>
                                            <td>{{$book->year}}</td>
                                            <td>{{$book->edition}}</td>
                                            <td>{{$book->description }}</td>
                                            <td> @php $i=0;$a=0 @endphp
                                                @foreach($barcodes as $barcode)
                                                    @if($barcode->book_id===$book->id)
                                                        @php $a++ @endphp
                                                        @if($barcode->status===1)
                                                            @php $i++ @endphp
                                                        @endif
                                                    @endif
                                                @endforeach
                                                {{$i}}/{{$a}}
                                            </td>
                                            <td>@if($user=auth()->user())
                                                    <a href="{{action("FrontController@rentBook",['id'=>$book->id])}}"
                                                       class="btn btn-secondary">Ontlenen</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="col-12">
                @if(isset($others))
                    <p> De zoekresultaten voor " <b> {{ $query }} </b> " zijn:</p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Voornaam</th>
                            <th>Achternaam</th>
                            <th>Boektitels</th>
                            <th>Jaar</th>
                            <th>Editie</th>
                            <th>Beschrijving</th>
                            <th>Beschikbaar</th>
                            @if($user=auth()->user())
                                <th></th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($others as $book)
                            @if(!empty($book))
                                @foreach($authors as $author)
                                    @if($book->author_id===$author->id)
                                        <tr>
                                            <td>{{$author->author_firstname}}</td>
                                            <td>{{$author->author_lastname}}</td>
                                            <td>{!! $book->booktitle!!} </td>
                                            <td>{{$book->year}}</td>
                                            <td>{{$book->edition}}</td>
                                            <td>{{$book->description }}</td>
                                            <td> @php $i=0;$a=0 @endphp
                                                @foreach($barcodes as $barcode)
                                                    @if($barcode->book_id===$book->id)
                                                        @php $a++ @endphp
                                                        @if($barcode->status===1)
                                                            @php $i++ @endphp
                                                        @endif
                                                    @endif
                                                @endforeach
                                                {{$i}}/{{$a}}
                                            </td>
                                            <td>@if($user=auth()->user())
                                                    <a href="{{action("FrontController@rentBook",['id'=>$book->id])}}"
                                                       class="btn btn-secondary">Ontlenen</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="col-12">
                @if(isset($descriptions))
                    <p> De zoekresultaten voor " <b> {{ $query }} </b> " zijn:</p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Voornaam</th>
                            <th>Achternaam</th>
                            <th>Boektitels</th>
                            <th>Jaar</th>
                            <th>Editie</th>
                            <th>Beschrijving</th>
                            <th>Beschikbaar</th>
                            @if($user=auth()->user())
                                <th></th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($descriptions as $book)

                            @if(!empty($book))
                                @foreach($authors as $author)
                                    @if($book->author_id===$author->id)
                                        <tr>
                                            <td>{{$author->author_firstname}}</td>
                                            <td>{{$author->author_lastname}}</td>
                                            <td>{{$book->booktitle}} </td>
                                            <td>{{$book->year}}</td>
                                            <td>{{$book->edition}}</td>
                                            <td>{!! $book->description !!}</td>
                                            <td> @php $i=0;$a=0 @endphp
                                                @foreach($barcodes as $barcode)
                                                    @if($barcode->book_id===$book->id)
                                                        @php $a++ @endphp
                                                        @if($barcode->status===1)
                                                            @php $i++ @endphp
                                                        @endif
                                                    @endif
                                                @endforeach
                                                {{$i}}/{{$a}}
                                            </td>
                                            <td>@if($user=auth()->user())
                                                    <a href="{{action("FrontController@rentBook",['id'=>$book->id])}}"
                                                       class="btn btn-secondary">Ontlenen</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @endif
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('succes'))
                    <div class="alert alert-success">
                        {{ session('succes') }}
                    </div>
                @endif
            </div>
        </div>

    </div>


</div>



@endsection

