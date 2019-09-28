@extends ('layouts.master')

@section('title','Show Category')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
			<div class="card-body">
			 	<div class="form-group">
			 		<h5>ID   -{{ $cat->id }}</h5>
			 		<h5>Name -{{ $cat->name }} </h5>
			 		<h5>Age  - {{ $cat->age}}</h5>
			 		<img src="{{ URL::to('/') }}/images/{{ $cat->image }}" class="img-thumbnail" />
				</div>
			</div>
			<a href="{{ url('category') }}" class="btn btn-primary">Back</a>
		</div>
	</div>
</div>

@endsection