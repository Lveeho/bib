@extends('layouts.admin')
@section('content')
    <h1 class="mb-3">Historiek uitleningen</h1>
    <hr>
    <table class="table table-striped mt-2">
        <thead>
        <tr class="bg-white">
            <th scope="col">Gebruiker</th>
            <th scope="col">Barcode</th>
            <th scope="col">Ontleend op</th>
            <th scope="col">Teruggebracht op</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @if($logs)
            @foreach($logs as $log)
                <tr>
                    <td>{{$log->user_id}}</td>
                    <td>{{$log->barcode_id}}</td>
                    <td>{{$log->rentaldate}} </td>
                    <td>{{$log->returndate}} </td>
                </tr>
            @endforeach
        @endif
        </tbody>

    </table>
    <div class="row">
        <div class="col-12">
            {{$logs->render()}}
        </div>
    </div>


@endsection
