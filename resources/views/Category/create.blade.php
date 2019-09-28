@extends('layouts.master')

@section('title', 'Create Category')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">

            @include('alerts')

            <div class="card">
                <div class="card-header">
                    Create Category
                </div>
                <div class="card-body">
                    <form action="{{ url('/category') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Age</label>
                            <input type="text" class="form-control" name="age">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Seleted Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>


                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ url('category') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
