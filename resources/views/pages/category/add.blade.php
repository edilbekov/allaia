@extends('layouts.base')
@section('content')
<div class="container">
    <form action="{{route('add_category')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Category</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="category">    
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection