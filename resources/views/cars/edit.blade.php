@extends('cars.layouts.main')

@section('title', "Edit a {$car->getModel()}")

@section('content')
    <!-- /.row -->
    {{ Form::model($car, ['route' => ['cars.update', $car->getId()], 'method' => 'patch']) }}
    <div class="form-group row col-xs-7">
        {{ Form::label('model', 'Car Model') }}
        {{ Form::text('model', $car->getModel(), ['placeholder' => 'Enter car model name', 'class' => 'form-control']) }}
        @foreach($errors->get('model') as $error)
            <span class="alert-danger">{{ $error }}</span>
        @endforeach
    </div>
    <div class="form-group row col-xs-7">
        {{ Form::label('year', 'Car Year') }}
        {{ Form::text('year', $car->getYear(), ['placeholder' => 'Enter car year', 'class' => 'form-control']) }}
        @foreach($errors->get('year') as $error)
            <span class="alert-danger">{{ $error }}</span>
        @endforeach
    </div>
    <div class="form-group row col-xs-7">
        {{ Form::label('registration_number', 'Car registration number') }}
        {{ Form::text('registration_number', $car->getRegistrationNumber(), ['placeholder' => 'Enter car registration number', 'class' => 'form-control ']) }}
        @foreach($errors->get('registration_number') as $error)
            <span class="alert-danger">{{ $error }}</span>
        @endforeach
    </div>
    <div class="form-group row col-xs-7">
        {{ Form::label('color', 'Car Color') }}
        {{ Form::text('color', $car->getColor(), ['placeholder' => 'Enter car color', 'class' => 'form-control']) }}
        @foreach($errors->get('color') as $error)
            <span class="alert-danger">{{ $error }}</span>
        @endforeach
    </div>
    <div class="form-group row col-xs-7">
        {{ Form::label('price', 'Car Price') }}
        {{ Form::text('price', $car->getPrice(), ['placeholder' => 'Enter car price', 'class' => 'form-control']) }}
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

