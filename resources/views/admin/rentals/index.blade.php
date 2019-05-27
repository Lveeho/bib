@section('content')
    <h1 class="mb-3">Lopende uitleningen</h1>
    <hr>
    <table class="table table-striped mt-2">
        <thead>
        <tr class="bg-white">
            <th scope="col">Gebruiker</th>
            <th scope="col">Barcode</th>
            <th scope="col">Boekinfo</th>
            <th scope="col">Ontleend op</th>
            <th scope="col">Terugbrengen op</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($rentals))
            @foreach($users as $user)
                 @foreach($rentals as $rental)
                     @if($user->id===$rental->user_id)
                <tr>
                    <td>
                            {{$user->user_firstname}} {{$user->user_lastname}}
                    </td>
                    <td>@foreach($barcodes as $barcode)
                            @if ($barcode->id===$rental->barcode_id)
                        {{$barcode->barcode}}

                            @endif
                            @endforeach
                    </td>
                    <td>@foreach($barcodes as $barcode)
                            @if ($barcode->id===$rental->barcode_id)

                                <?php $author=App\Author::where('id',$barcode->book->author_id)->first();
                                ?>
                        <table>
                            <thead>
                            <th></th>
                            <th></th>
                            </thead>
                            <tbody>
                            <td class="pl-0">
                                Auteur <br>
                                Titel <br>
                                Jaar <br>
                                Editie <br>
                            </td>
                            <td>{{$author->author_firstname[0]}}. {{$author->author_lastname}} <br>
                            {{$barcode->book->booktitle}} <br>
                            {{$barcode->book->year}} <br>
                            {{$barcode->book->edition}}<br>
                            </td>
                            </tbody>


                        </table>

                            @endif
                        @endforeach
                    </td>

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
                @endif
                    @endforeach
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
