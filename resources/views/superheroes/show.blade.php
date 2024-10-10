@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Superhero Details</h1>

        <div class="card">
            <div class="card-header">
                {{ $superhero->superhero_name }}
            </div>
            <div class="card-body">
                <p><strong>Real Name:</strong> {{ $superhero->real_name }}</p>
                <p><strong>Photo:</strong> <img src="{{ $superhero->photo_url }}" alt="{{ $superhero->superhero_name }}" class="img-fluid"></p>
                <p><strong>Additional Information:</strong> {{ $superhero->additional_info }}</p>
                <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
