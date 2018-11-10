@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			@if (session('status'))
    <div class="alert alert-success alert-dismissible border-0 fade show" role="alert" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
		    </div>
		@endif
			@foreach($all_videos as $video)
			<div class="wall">
		    <h3><a href="/video/{{$video->id}}">{{ $video->title}}</a></h3>
		    <hr>
		    <a href="/edit_post/{{ $videos->id }}" class="btn btn-warning">Edit</a>
		    <a href="/delete/{{ $video->id }}"  class="btn btn-danger">Delete</a>
		    </div>
		     @endforeach()
		</div>
	</div>
</div><!-- /.container -->
@endsection

   