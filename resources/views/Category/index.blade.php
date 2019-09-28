@extends ('layouts.master')

@section('title','View Category')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
        
        @include('alerts')
        
        <a href="{{url('category/create') }}" class="btn btn-primary mb-3">Create</a>
        <table class="table table-bordered table-striped">
            <tr>
                <th width="5%">ID</th>
                <th width="20%">Name</th>
                <th width="10%">Age</th>
                <th width="20%">Image</td>
                <th width="20%">Created At</th>
                <th width="20%">Action</th>
            </tr>
            @foreach ($cats as $cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->age }}</td>
                <td><img src="{{ URL::to('/') }}/images/{{ $cat->image }}" class="img-thumbnail"  width="70" /></td>
                <td>{{ $cat->created_at->toFormattedDateString() }}</td>
                <td>
                    <a href="{{url('category/'. $cat->id.'/show')}}" class="btn btn-primary">Show</a>
                    <a href="{{url('category/' . $cat->id.'/edit')}}" class="btn btn-success">Edit</a>
                    <a href="{{url('category/'.$cat->id.'/delete')}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $cats->links() }}

        </div>
    </div>
    </div>
@endsection