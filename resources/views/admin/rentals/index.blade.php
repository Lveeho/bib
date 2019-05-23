@extends('layouts.admin')
@section('content')
    <h1 class="mb-3">Lopende uitleningen</h1>
    <hr>
    <table class="table table-striped mt-2">
        <thead>
        <tr class="bg-white">
            <th scope="col">Gebruiker</th>
            <th scope="col">Barcode</th>
            <th scope="col">Ontleend op</th>
            <th scope="col">Terugbrengen op</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @if($rentals)
            @foreach($rentals as $rental)
                <tr>
                    <td>{{$rental->user_id}}</td>
                    <td>{{$rental->barcode_id}}</td>
                    <td>{{$rental->rentaldate}} </td>
                    <td>
                        @php
                            $beginDatum=Carbon\Carbon::createFromFormat('Y-m-d',$rental->rentaldate,
                            'Europe/Brussels');
                            $eindDatum=$beginDatum->addDays(14);
                        @endphp
                        {{$eindDatum->format('Y-m-d')}}
                    </td>
                    <td>
                        <a href="{{action("FrontController@returnBook",['userId'=>$rental->user_id,
                        'barcodeId'=>$rental->barcode_id,'rentalDate'=>$rental->rentaldate,'rentalId'=>$rental->id])}}"
                           class="btn btn-secondary">Terugbrengen</a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>

    </table>
    <div class="row">
        <div class="col-12">
            {{$rentals->render()}}
        </div>
    </div>


@endsection
