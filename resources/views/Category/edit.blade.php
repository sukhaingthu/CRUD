@extends('layouts.master')

@section('title', 'Update Category')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">

            @include('alerts')

            <div class="card">
                <div class="card-header">
                    Update Category
                </div>
                <div class="card-body">
                    <form action="{{ url("category/$cat->id/edit") }}" method="post" enctype="multipart/form-data">
                        @csrf
                       
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $cat->name  }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Age</label>
                            <input type="text" class="form-control" name="age" value="{{ $cat->age  }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Seleted Image</label>
                            <input type="file" class="form-control" name="image">
                            <img src="{{ URL::to('/') }}/images/{{ $cat->image }}" class="img-thumbnail" width="100" />
                        <input type="hidden" name="hidden_image" value="{{ $cat->image }}" />
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ url('category') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

