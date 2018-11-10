@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			@foreach($all_posts as $post)
			<div class="wall">
		    <h3><a href="/show_post/{{ $post->id}}">{{ $post->title}}</a></h3>
		    <hr>
		    <a href="#" class="btn btn-warning">Edit</a>
		    <a href="#"  class="btn btn-danger">Delete</a>
		    </div>
		     @endsection
		</div>
	</div>
</div><!-- /.container -->

   