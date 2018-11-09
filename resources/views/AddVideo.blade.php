@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			 <h1>Add Post</h1>
        <form>
        	<div class="form-group">
        		<label>Name</label>
        		<input type="text" name="name" class="form-control">
        	</div>

        	<div class="form-group">
        		<label>Email</label>
        		<input type="text" name="email" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Post Title</label>
        		<input type="text" name="title" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Upload Video</label>
        		<input type="file" name="video" class="form-control">	
        	</div>
        	<button type="submit" class="btn btn-primary" >Add Video</button>
        </form>	
		</div>
      </div>

    </div><!-- /.container -->

    @endsection