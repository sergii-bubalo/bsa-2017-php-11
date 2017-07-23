@extends('cars.layouts.main')

@section('title', 'Add a car')

@section('content')
    <!-- /.row -->
    {{ Form::open(['route' => 'cars.store', 'class' => 'form']) }}
        <div class="form-group row col-xs-7">
            {{ Form::label('model', 'Car Model') }}
            {{ Form::text('model', old('model'), ['placeholder' => 'Enter car model name', 'class' => 'form-control']) }}
            @foreach($errors->get('model') as $error)
                <span class="alert-danger">{{ $error }}</span>
            @endforeach
        </div>
        <div class="form-group row col-xs-7">
            {{ Form::label('year', 'Car Year') }}
            {{ Form::text('year', old('year'), ['placeholder' => 'Enter car year', 'class' => 'form-control']) }}
            @foreach($errors->get('year') as $error)
                <span class="alert-danger">{{ $error }}</span>
            @endforeach
        </div>
        <div class="form-group row col-xs-7">
            {{ Form::label('registration_number', 'Car registration number') }}
            {{ Form::text('registration_number', old('registration_number'), ['placeholder' => 'Enter car registration number', 'class' => 'form-control ']) }}
            @foreach($errors->get('registration_number') as $error)
                <span class="alert-danger">{{ $error }}</span>
            @endforeach
        </div>
        <div class="form-group row col-xs-7">
            {{ Form::label('color', 'Car Color') }}
            {{ Form::text('color', old('color'), ['placeholder' => 'Enter car color', 'class' => 'form-control']) }}
            @foreach($errors->get('color') as $error)
                <span class="alert-danger">{{ $error }}</span>
            @endforeach
        </div>
        <div class="form-group row col-xs-7">
            {{ Form::label('price', 'Car Price') }}
            {{ Form::text('price', old('price'), ['placeholder' => 'Enter car price', 'class' => 'form-control']) }}
            @foreach($errors->get('price') as $error)
                <span class="alert-danger">{{ $error }}</span>
            @endforeach
        </div>
        <div class="form-group row col-xs-7">
            {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
        </div>
        {{ Form::token() }}
    {{ Form::close() }}
@endsection

