@extends('layouts.base')
@section('content')
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Sub Category ID</th>      
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Discount price</th>
      <th scope="col">Descriptions</th>
      <th scope="col">Sizes</th>
      <th scope="col">Colors</th> 
      <th scope="col">Edit</th> 
      <th scope="col">Delete</th> 
    </tr>
  </thead>
  <tbody> 
    @if ($products)    
    @foreach($products as $product)
    <tr>
      <th scope="row">{{$product['sub_category_id']}}</th>
      <td>{{$product['name']}}</td>
      <td>{{$product['price']}}</td>      
      <td>{{$product['discount_price']}}</td>
      <td>{{implode(", ",json_decode($product['descriptions'],1));}}</td>
      <td>{{implode(", ",json_decode($product['sizes'],1))}}</td>
      <td>{{implode(", ",json_decode($product['colors'],1))}}</td>      
      <td>
        <form action="{{route('edit_product', ['id'=>$product['id']])}}" method="GET">
            @csrf
            <button type="submit" style="background:none; border:none;"><i class="bi bi-pencil-square"></i></button>          
        </form>
      </td>  
      <td>
        <form action="{{route('delete_product', ['id'=>$product['id']])}}" method="POST">
            @csrf
            <button type="submit" style="background:none; border:none;"><i class="bi bi-trash-fill"></i></button>          
        </form>
      </td>          
    </tr>
    @endforeach
    @endif  
  </tbody>
</table>
</div>
@endsection