@extends('user.layouts.base')
@section('main')
    <main>
            @foreach ($search as $item)
                <div class="col-6 col-md-4 col-xl-3">
                        <div class="grid_item">
                            <figure>
                                <!-- <span class="ribbon off">-30%</span> -->
                                <a href="{{route('single_page',['id'=>$item->id])}}">
                                    @foreach (json_decode($item->images,1) as $image)
                                        <img class="img-fluid lazy" src="{{$image}}" alt="">
                                    @endforeach                                    
                                </a>
                                <!-- <div data-countdown="2019/05/15" class="countdown"></div> -->
                            </figure>
                            <a href="{{route('single_page',['id'=>$item->id])}}">
                                <h3>{{$item->name}}</h3>
                            </a>
                            <div class="price_box">
                                <span class="new_price">{{$item->discount_price}}</span>                                
                            </div>
                            <ul>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                            </ul>
                        </div>                        
                    </div>                                        
            @endforeach	            			
            </div>    
			<div class="pagination__wrapper">
				<ul class="pagination">
					<li><a href="{{$search->previousPageUrl()}}" class="prev" title="previous page">&#10094;</a></li>
					@for ($i=1;$i<=$search->lastPage();$i++)                                            
                    <li>
						<a href="{{route('search', ['page'=> $i])}}" class="@if(request('page', 1) == $i) active @endif">{{$i}}</a>
					</li>
					@endfor
					<li><a href="{{$search->nextPageUrl()}}" class="next" title="next page">&#10095;</a></li>
				</ul>
			</div>
	</main>
@endsection