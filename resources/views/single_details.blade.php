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
			
			<div class="wall">
		    <h3>{{ $post_details->title}}</h3>
		    <h4>{{ $post_details->body}}</h4>
		    <hr>
		    <h3>Drop Comment Here</h3>
		    <form action="/process_comment" enctype="multipart/form-data" method="post">

		    <input type="hidden" name="{{ $post_details->id }}" class="form-control">
		    	<div class="form-group">
		    		<label>Email Address</label>
		    		<input type="text" name="email" class="form-control">	
		    	</div>

		    	<div class="form-group">
		    		<label>Comment</label>
		    		<textarea type="text" name="comment" class="form-control"></textarea>	
		    	</div>
		    	<input type="submit" value="Post Cooment" class="btn btn-primary">
		    </form>
		    </div>
		     
		</div>
	</div>
</div><!-- /.container -->
@endsection

   