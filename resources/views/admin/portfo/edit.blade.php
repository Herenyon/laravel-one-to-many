@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    

    <!-- /resources/views/post/create.blade.php -->
 
    <h1>Edit Repo {{ $portf->repo_title }}</h1>
    
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
   <form class="row g-3" action="{{route('admin.portf.update', $portf)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
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
        <div class="mb-3 @if(!$portf->image) d-none @endif" id="image-input-container">
            <div class="preview">
                <img id="file-image-preview" @if($portf->image) src="{{asset('storage/' . $portf->image)}} @endif">
            </div>
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="set_image" name="set_image" @if ($portf->image) checked @endif value="1">
            <label class="form-check-label" for="set_image">image set/unset</label>
        </div>
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>
</div>
@endsection