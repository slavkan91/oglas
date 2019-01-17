@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Dodaj Kategoriju</div>
                    <div class="card-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'KategorijaController@store']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Ime Kategorije') !!}
                            {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Kreiraj Kategoriju', ['class'=>'btn btn-primary']) !!}
                        </div>

                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Kategorije</div>
                    <div class="card-body">
                        @if(count($categories)>0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ime</th>
                                    <th>Opcije</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    {!! Form::open(['method'=>'DELETE','action'=>['KategorijaController@destroy',$category->id],'class'=>'form-inline']) !!}
                                    <a href="{{ route('kategorija.edit',$category->id) }}" class="btn btn-info">Izmjeni</a>
                                    {!! Form::button('Brisi', ['class'=>'btn btn-danger', 'type'=>'submit']) !!}
                                    {!! Form::close() !!}
                                </td>
                                </tr>
                                @endforeach
                                </tbody>
                        @else
                            </table>
                            <p>Nema Kategorija</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection