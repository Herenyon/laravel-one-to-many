@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
   <h2>{{ $type->name }}</h2>
   @foreach ($type->portfs as $portfs)
       <li>{{ $portfs->repo_title }}</li>
   @endforeach
</div>
@endsection