@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
  		<div class="col-md-6">
  			@foreach($all_business as $business)
  	<div class="wall">
    <h3>{{ article.title }}</h3>
    </div>
    @endforeach();
  		</div>
  </div>		
</div><!-- /.container -->

    @endsection