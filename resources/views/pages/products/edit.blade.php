@extends('layouts.base')
@section('content')
<br><br>
<form action="{{route('edited',['id'=>$id])}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-4">
            <label for="exampleInputEmail1" class="form-label">Product name</label>
            <input type="text" value="{{$product[0]['name']}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">    
        </div>
        <div class="col-4">
            <label for="exampleInputEmail1" class="form-label">Price</label>
            <input type="text" value="{{$product[0]['price']}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="price">    
        </div>
        <div class="col-4">
            <label for="exampleInputEmail1" class="form-label">Discount price</label>
            <input type="text" value="{{$product[0]['discount_price']}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="discount_price">    
        </div>
<br>
        <div class="col-4">
            <label for="exampleInputEmail1" class="form-label">QQ</label>
            <textarea type="text" class="form-control" placeholder="Ta'riyp" id="exampleInputEmail1" aria-describedby="emailHelp" name="descriptions[qq]"></textarea>    
        </div>
        <div class="col-4">
            <label for="exampleInputEmail1" class="form-label">UZ</label>
            <textarea type="text" class="form-control" placeholder="Ta'rif" id="exampleInputEmail1" aria-describedby="emailHelp" name="descriptions[uz]"></textarea>
        </div>
        <div class="col-4">
            <label for="exampleInputEmail1" class="form-label">EN</label>
            <textarea type="text" class="form-control" placeholder="Description" id="exampleInputEmail1" aria-describedby="emailHelp" name="descriptions[en]"></textarea>
        </div><br>
        <div class="col-4">
            <label for="exampleInputEmail1" class="form-label">Sizes</label>
            <input type="text" value="{{implode(', ',json_decode($product[0]['sizes'],1))}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="sizes">    
        </div>
        <div class="col-4">
            <label for="exampleInputEmail1" class="form-label">Colors</label>
            <input type="text" value="{{implode(', ',json_decode($product[0]['colors'],1))}}" value="{{$product[0]['colors']}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="colors">    
        </div>
        <div class="col-4">
            <label for="exampleInputEmail1" class="form-label">Photo</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="photo">    
        </div>
    </div>
    <br>
    <button type="submit" style="float:right" class="btn btn-primary">Save</button>
</form>
@endsection