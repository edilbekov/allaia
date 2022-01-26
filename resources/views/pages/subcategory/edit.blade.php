@extends('layouts.base')
@section('content')
<div class="container">
    <form action="{{route('edit_subcategory',['id'=>$id])}}" method="POST">
    @csrf
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Sub Category</label>
        <input type="text" class="form-control" placeholder="Edit subcategory here!" id="exampleInputEmail1" aria-describedby="emailHelp" name="edited_category">    
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection