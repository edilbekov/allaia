@extends('layouts.base')
@section('content')
<div class="container">
    <form action="{{route('add_subcategory')}}" method="POST">
        @csrf        
        <select name="category_id" id="">
            <option value="">Open this select menu</option>
            @foreach($categories as $item)
                <option value="{{$item['id']}}">{{$item['name']}}</option>
            @endforeach
        </select>        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Sub Category</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="category">    
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection