@extends('user.layouts.base')
@section('style')
<link href="{{asset('css/listing.css')}}" rel="stylesheet">
@endsection
@section('main')
    <main>
		<div class="top_banner">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
				<div class="container">
					<div class="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Category</a></li>
							<li>Page active</li>
						</ul>
					</div>
					<h1>{{$subcategory}} - Grid listing</h1>
				</div>
			</div>
			<img src="{{json_decode($products[0]->images,1)[0]}}" class="img-fluid" alt="">
		</div>
		<!-- /top_banner -->

		<div id="stick_here">
			<div class="toolbox elemento_stick">
				<div class="container">
                    <ul class="clearfix">
                        <li>
						<form action="{{route('sort',['subcategory'=>$subcategory])}}" method="GET">
                            <div class="sort_select">	
								
                                <select name="sort" id="sort">                                        
								<option value="popularity" selected="selected">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price_low">Sort by price: low to high</option>
                                        <option value="price_high">Sort by price: high to </option>
                                </select>								
							
                            </div>
							<input type="submit" value="submit">
							</form>													
                        </li>
                        <li>
                            <a href="#0"><i class="ti-view-grid"></i></a>
                            <a href="listing-row-1-sidebar-left.html"><i class="ti-view-list"></i></a>
                        </li>
                        <li>
                            <a data-bs-toggle="collapse" href="#filters" role="button" aria-expanded="false" aria-controls="filters">
                                <i class="ti-filter"></i><span>Filters</span>
                            </a>
                        </li>
                    </ul> 
                </div>               
				<div class="collapse" id="filters">
                    <div class="row small-gutters filters_listing_1">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="dropdown">
						<a href="#" data-bs-toggle="dropdown" class="drop">Categories</a>
						<div class="dropdown-menu">
							<div class="filter_type">
									<ul>
										<li>
											<label class="container_check">Men <small>12</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">Women <small>24</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">Running <small>23</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">Training <small>11</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
									</ul>
									<a href="#0" class="apply_filter">Apply</a>
								</div>
						</div>
					</div>
					<!-- /dropdown -->
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="dropdown">
						<a href="#" data-bs-toggle="dropdown" class="drop">Color</a>
						<div class="dropdown-menu">
							<div class="filter_type">
									<ul>
										<li>
											<label class="container_check">Blue <small>06</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">Red <small>12</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">Orange <small>17</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">Black <small>43</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
									</ul>
									<a href="#0" class="apply_filter">Apply</a>
								</div>
						</div>
					</div>
					<!-- /dropdown -->
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="dropdown">
						<a href="#" data-bs-toggle="dropdown" class="drop">Brand</a>
						<div class="dropdown-menu">
							<div class="filter_type">
									<ul>
										<li>
											<label class="container_check">Adidas <small>11</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">Nike <small>08</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">Vans <small>05</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">Puma <small>18</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
									</ul>
									<a href="#0" class="apply_filter">Apply</a>
								</div>
						</div>
					</div>
					<!-- /dropdown -->
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="dropdown">
						<a href="#" data-bs-toggle="dropdown" class="drop">Price</a>
						<div class="dropdown-menu">
							<div class="filter_type">
									<ul>
										<li>
											<label class="container_check">$0 — $50<small>11</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">$50 — $100<small>08</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">$100 — $150<small>05</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label class="container_check">$150 — $200<small>18</small>
											  <input type="checkbox">
											  <span class="checkmark"></span>
											</label>
										</li>
									</ul>
									<a href="#0" class="apply_filter">Apply</a>
								</div>
						</div>
					</div>
					<!-- /dropdown -->
			
				</div></div></div>
				</div>
			</div>
			<!-- /toolbox -->

			<div class="container margin_30">
			<div class="row small-gutters">

			@foreach ($products as $product)
                <div class="col-6 col-md-4 col-xl-3">
                        <div class="grid_item">
                            <figure>
                                <!-- <span class="ribbon off">-30%</span> -->
                                <a href="{{route('single_page',['id'=>$product->id])}}">
                                    @foreach (json_decode($product->images,1) as $image)
                                        <img class="img-fluid lazy" src="{{$image}}" alt="">
                                    @endforeach                                    
                                </a>
                                <!-- <div data-countdown="2019/05/15" class="countdown"></div> -->
                            </figure>
                            <a href="{{route('single_page',['id'=>$product->id])}}">
                                <h3>{{$product->name}}</h3>
                            </a>
                            <div class="price_box">
                                <span class="new_price">{{$product->discount_price}}</span>
                                <span class="old_price">{{$product->price}}</span>
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
					<li><a href="{{$products->previousPageUrl()}}" class="prev" title="previous page">&#10094;</a></li>
					@for ($i=1;$i<=$products->lastPage();$i++)
					<li>
						<a href="{{route('subcategory', ['subcategory'=>$subcategory, 'page'=> $i])}}" class="@if(request('page', 1) == $i) active @endif">{{$i}}</a>
					</li>					
					@endfor																
					<li><a href="{{$products->nextPageUrl()}}" class="next" title="next page">&#10095;</a></li>
				</ul>
			</div>
				
		</div>
		<!-- /container -->
	</main>
@endsection