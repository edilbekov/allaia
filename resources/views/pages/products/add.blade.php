@extends('layouts.base')
@section('content')
<form action="{{route('add_product')}}" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="row">
        <div class="col-6">
            <label class="form-label">Category</label>
            <select class="form-select" onchange="select(this)">
            <option value="">Open this select menu</option>                                
            @foreach($categories as $item)
                <option value="{{$item['id']}}">{{$item['name']}}</option>                                    
            @endforeach
            </select>
        </div>        
        <div class="col-6">
            <label for="exampleInputEmail1" class="form-label">Sub Category</label>
            <select name="subcategory_id" class="form-select" id="hello">
                <option selected>Open this select menu</option>                                
            </select>
        </div>
        <br><br><br><br>
        <div class="col-4">
            <label for="exampleInputEmail1" class="form-label">Product name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" required>    
        </div>
        <div class="col-4">
            <label for="exampleInputEmail1" class="form-label">Price</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="price" required>    
        </div>
        <div class="col-4">
            <label for="exampleInputEmail1" class="form-label">Discount price</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="discount_price" required>    
        </div>

        <div class="col-4">
            <label for="exampleInputEmail1" class="form-label">QQ</label>
            <textarea type="text" class="form-control" placeholder="Ta'riyp" id="exampleInputEmail1" aria-describedby="emailHelp" name="descriptions[qq]" required></textarea>    
        </div>
        <div class="col-4">
            <label for="exampleInputEmail1" class="form-label">UZ</label>
            <textarea type="text" class="form-control" placeholder="Ta'rif" id="exampleInputEmail1" aria-describedby="emailHelp" name="descriptions[uz]" required></textarea>
        </div>
        <div class="col-4">
            <label for="exampleInputEmail1" class="form-label">EN</label>
            <textarea type="text" class="form-control" placeholder="Description" id="exampleInputEmail1" aria-describedby="emailHelp" name="descriptions[en] required"></textarea>
        </div>
        <div class="col-4">
            <label for="exampleInputEmail1" class="form-label">Sizes</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="sizes" required>    
        </div>
        <div class="col-4">
            <label for="exampleInputEmail1" class="form-label">Colors</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="colors" required>    
        </div>
        <div class="col-4">
            <label for="exampleInputEmail1" class="form-label">Images</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="images[]" multiple required>    
        </div>        
    </div><br>
    <button style="float:right" type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@section('script')
<script>
    function select(id){
        $.ajax({
            url:"http://127.0.0.1:8000/api/category/"+id.value,
            success:function(result){
                $('#hello').children().remove();
                result.forEach(element=>{
                    $('#hello').append($('<option>').val(element.id).text(element.name))
                });
            }
        });
    }
</script>
@endsection