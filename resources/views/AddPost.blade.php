@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			 <h1>{{ $title }}</h1>
        <form action="/process_post" enctype="multipart/form-data" method="post">
        	{{ csrf_field() }}
        	<div class="form-group">
        		<label>Name</label>
        		
        		<input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Name Here" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
        		@if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
        	</div>

        	<div class="form-group">
        		<label>Email</label>
        		<input type="text" name="email" value="{{ old('email') }}" placeholder="Enter Email Address Here" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
        		@if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
        	</div>
        	<div class="form-group">
        		<label>Post Title</label>
        		<input type="text" name="title" value="{{ old('title') }}" placeholder="Enter Post Title Here" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" >
        		@if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('title') }}</strong>
                </span>
                @endif
        	</div>
        	<div class="form-group">
        		<label>Post Body</label>
        		<textarea type="text" cols="20" rows="3" value="{{ old('body') }}" placeholder="Enter Post Body Here" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }} "name="body"></textarea>
        		@if ($errors->has('body'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('body') }}</strong>
                </span>
                @endif	
        	</div>
        	<button type="submit" class="btn btn-primary" >Add Post</button>
        </form>	
		</div>
      </div>

    </div><!-- /.container -->

    @endsection