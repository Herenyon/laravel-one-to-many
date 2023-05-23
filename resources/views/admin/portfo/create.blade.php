@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <h2>Create Repo</h2>

    <!-- /resources/views/post/create.blade.php -->
 
    <h1>Create Post</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
<!-- Create Post Form -->
   <form class="row g-3" action="{{route('admin.portf.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="col-md-6">
            <label for="repo-name" class="form-label">Repo Name</label>
            <input type="text" class="form-control" id="repo-name" name="repo_title">
        </div>
        <div class="col-md-6">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author">
        </div>
        <div class="col-12">
            <label for="nickname" class="form-label">Nickname</label>
            <input type="text" class="form-control" id="nickname" placeholder="" name="nickname">
        </div>
        <div class="col-12">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" placeholder="" name="description"></textarea>
        </div>
        <div class="mb-3">
            <div class="preview">
                <img id="file-image-preview">
            </div>
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <div>
        <label for="type_id" class="form-label">Language</label>
        <select class="form-select" aria-label="Default select example" name="type_id" id="type_id">
            <option selected value="">Select Language</option>
            @foreach ($types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
               
            @endforeach
        </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
@endsection