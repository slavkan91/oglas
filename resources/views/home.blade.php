@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kreiraj Oglas</div>

                <div class="card-body">

                    {!! Form::open(['method' => 'POST', 'action' => 'OglasController@store', 'files' => true]) !!}

                    <div class="form-group">
                        {!! Form::label('ime', 'Unesite ime oglasa', ['class'=>'form-label']) !!}
                        {!! Form::text('ime', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('kategorija_id', 'Kategorije', ['class'=>'form-label']) !!}
                        {!! Form::select('kategorija_id', [''=>'Izaberite kategoriju']+$kategorije, '', ['class'=>'custom-select']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('cijena', 'Cijena', ['class'=>'form-label']) !!}
                        {!! Form::number('cijena', null, ['class'=>'form-control', 'step'=>'0.01']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('kilometraza', 'Kilometraza', ['class'=>'form-label']) !!}
                        {!! Form::number('kilometraza', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('godiste','Izaberite Godiste',['class'=>'form-label']) !!}
                        {!! Form::selectRange('godiste', 1990, 2019, null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('slika', 'Slika auta', ['class'=>'form-label']) !!}
                        {!! Form::file('slika') !!}
                    </div>

                    {!! Form::submit('postavi oglas', ['class'=> 'btn btn-primary']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
