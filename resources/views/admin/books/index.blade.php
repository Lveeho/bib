@extends('layouts.admin')
@section('content')
    <h1>Users</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">ISBN</th>
            <th scope="col">Titel</th>
            <th scope="col">Autheur</th>
            <th scope="col">Jaar</th>
            <th scope="col">Editie</th>
            <th scope="col">Beschrijving</th>
            <th scope="col">Foto</th>
            <th scope="col">Barcodes</th>
            <th scope="col">Aantal</th>

        </tr>
        </thead>
        <tbody>
        @if($books)
            @foreach($books as $book)
                <tr>
                    <td>{{$book->id}}
                        <button type="button" class="btn btn-secondary ml-2 text-primary">
                            <a href="{{route('books.edit',$book->id)}}">Edit</a>
                        </button>
                    </td>
                    <td>{{$book->ISBN}}</td>
                    <td>{{Str::limit(($book->booktitle),30)}}</td>
                    <td>{{$book->author_id}}</td>
                    <td>{{$book->year}}</td>
                    <td>{{$book->edition}}</td>
                    <td> {{Str::limit(($book->description),10)}}</td>
                    <td>{{$book->photo_id}}</td>
                    <td>@foreach($book->barcodes as $barcode)
                    {{$barcode->barcode}} <br/>
                            @endforeach
                    </td>

                    <td><?php $i=0;?>
                        @foreach($book->barcodes as $barcode)
                            @if($barcode->status == 1)
                                <?php $i++ ?>
                            @endif
                            @endforeach
                        {{$i}}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>

    </table>
    <div class="row">
        <div class="col-12">
            {{$books->render()}}
        </div>
    </div>

@endsection
