@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Superheroes List</h1>

        <a href="{{ route('superheroes.create') }}" class="btn btn-primary mb-3">Add New Superhero</a>

        @if($superheroes->isEmpty())
            <p>No superheroes found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Real Name</th>
                        <th>Superhero Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($superheroes as $superhero)
                        <tr>
                            <td>{{ $superhero->id }}</td>
                            <td>{{ $superhero->real_name }}</td>
                            <td>{{ $superhero->superhero_name }}</td>
                            <td>
                                <a href="{{ route('superheroes.show', $superhero->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('superheroes.edit', $superhero->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('superheroes.destroy', $superhero->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
