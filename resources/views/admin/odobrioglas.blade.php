@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Oglasi</div>
                    <div class="card-body">
                        @if(count($oglasi)>0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ime</th>
                                    <th>Kategorija</th>
                                    <th>Kilometraza</th>
                                    <th>Godiste</th>
                                    <th>Cijena</th>
                                    <th>Odobri</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($oglasi as $oglas)
                                    <tr>
                                        <td>{{ $oglas->id }}</td>
                                        <td>{{ $oglas->ime }}</td>
                                        <td>{{ $oglas->kategorija->name }}</td>
                                        <td>{{ $oglas->kilometraza }}</td>
                                        <td>{{ $oglas->godiste }}</td>
                                        <td>{{ $oglas->cijena }}</td>
                                        <td>
                                            @if($oglas->odobreno==0)
                                            {!! Form::open(['method'=>'PATCH','action'=>['OglasController@update',$oglas->id],'class'=>'form-inline']) !!}
                                            {!! Form::hidden('odobreno', 1) !!}
                                            {!! Form::button('Odobri', ['class'=>'btn btn-danger', 'type'=>'submit']) !!}
                                            {!! Form::close() !!}
                                                @else
                                            Oglas je odobren!
                                                @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row justify-content-centar">
                                <div class="pagination">
                                    {{ $oglasi->links() }}
                                </div>
                            </div>
                        @else
                            <p>Nema Kategorija</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection