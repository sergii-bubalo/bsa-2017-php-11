@extends('cars.layouts.main')

@section('title', 'Cars list')

@section('content')
    <ul>
        @forelse($cars as $car)
            <li>
                <a href="{{ route('cars.show', ['id' => $car->getId()]) }}">{{ $car->getModel() }}</a>
            </li>
            <ul>
                <li>
                    Color - {{ $car->getColor() }}
                </li>
                <li>
                    Price - {{ $car->getPrice() }}k $
                </li>
            </ul>
        @empty
            <h3>No cars</h3>
        @endforelse
    </ul>
@endsection