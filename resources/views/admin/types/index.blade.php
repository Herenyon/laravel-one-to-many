@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between">
        <h2>Types List</h2>
        <div>
        <a href="{{route('admin.types.create')}}" class="btn btn-small btn-secondary mx-1">New Type</a>
        </div>
    </div>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Language Name</th>
            <th scope="col">Slug</th>
            
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <th scope="row">{{ $type->id }}</th>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->slug }}</td>
                    
                    <td>
                        <ul class="list-unstyled d-flex">
                            <li><a href="{{route('admin.types.show', $type->slug)}}" class="btn btn-small btn-secondary mx-1">Show</a></li>
                            <li><a href="{{route('admin.types.edit', $type->id)}}" class="btn btn-small btn-warning mx-1">Edit</a></li>
                            <li>
                                <form action="{{ route('admin.types.destroy', $type) }}" method="POST" id="form">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Cancella" class="btn btn-danger bottone-elimina" id="{{ $type->id }}">
                                </form>
                            </li>
                            
                            
                        </ul>
                    </td>
                </tr>
            @endforeach  
        </tbody>
    </table>
</div>
@endsection