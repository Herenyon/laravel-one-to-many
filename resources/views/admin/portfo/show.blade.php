@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
   <h2>{{ $portfo->repo_title }}</h2>
   <div>
      <img src="{{asset('storage/'.$portfo->image)}}" alt="">
   </div>
   @if ($portfo->type_id) 
       <h3>{{ $portfo->type->name }}</h3>
   @endif
</div>
@endsection