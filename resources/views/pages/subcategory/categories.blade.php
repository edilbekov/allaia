@extends('layouts.base')
@section('content')
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Sub Category</th>
      <th scope="col">Category</th>      
      <th scope="col">Delete</th> 
      <th scope="col">Edit</th> 
    </tr>
  </thead>
  <tbody>   
    @foreach($categories as $category)
    <tr>
      <th scope="row">{{$category['id']}}</th>
      <td>{{$category['subcategory_name']}}</td>
      <td>{{$category['category_name']}}</td>
      <td>
        <form action="{{route('delete_sub', ['id'=>$category['id']])}}" method="POST">
            @csrf
            <button type="submit" style="background:none; border:none;"><i class="bi bi-trash-fill"></i></button>          
        </form>
      </td>
      <td>
        <form action="{{route('edit_sub', ['id'=>$category['id']])}}" method="POST">
            @csrf
            <button type="submit" style="background:none; border:none;"><i class="bi bi-pencil-square"></i></button>          
        </form>
      </td>      
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
