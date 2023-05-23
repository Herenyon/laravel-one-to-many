@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                   <div>Welcome Back, {{ Auth::user()->name }}</div> 
                   <div><a href="{{route('admin.portf.index')}}" class="btn btn-small btn-secondary mx-1">More Repo</a></div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Repo Name</th>
                            <th scope="col">Author</th>
                            <th scope="col">Date of Creation</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 3; $i++) 
                                <tr>
                                    <th scope="row">{{ $portf[$i]->id }}</th>
                                    <td>{{ $portf[$i]->repo_title }}</td>
                                    <td>{{ $portf[$i]->author }}</td>
                                    <td>{{ $portf[$i]->date_of_start }}</td>    
                                </tr>
                            @endfor
                                
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
