@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between">
        <h2>Repos List</h2>
        <div>
        <a href="{{route('admin.portf.create')}}" class="btn btn-small btn-secondary mx-1">New Repo</a>
        </div>
    </div>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Repo Name</th>
            <th scope="col">Author</th>
            <th scope="col">Author Nickname</th>
            <th scope="col">Description</th>
            <th scope="col">Date of Creation</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($portf as $portfo)
                <tr>
                    <th scope="row">{{ $portfo->id }}</th>
                    <td>{{ $portfo->repo_title }}</td>
                    <td>{{ $portfo->author }}</td>
                    <td>{{ $portfo->nickname }}</td>
                    <td>{{ $portfo->description }}</td>
                    <td>{{ $portfo->date_of_start }}</td>
                    <td>
                        <ul class="list-unstyled d-flex">
                            <li><a href="{{route('admin.portf.show', $portfo->slug)}}" class="btn btn-small btn-secondary mx-1">Show</a></li>
                            <li><a href="{{route('admin.portf.edit', $portfo->id)}}" class="btn btn-small btn-warning mx-1">Edit</a></li>
                            <li>
                                <form action="{{ route('admin.portf.destroy', $portfo) }}" method="POST" id="form">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Cancella" class="btn btn-danger bottone-elimina" id="{{ $portfo->id }}">
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