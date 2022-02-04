@extends('user.layouts.base')
@section('main')
    <main>
		<div id="carousel-home">
			<div class="owl-carousel owl-theme">
				<div class="owl-slide cover" style="background-image: url('{{json_decode($slider_products[0]->images,1)[0]}}');">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-end">
								<div class="col-lg-6 static">
									<div class="slide-text text-end white">
										<h2 class="owl-slide-animated owl-slide-title">{{$slider_products[0]->name}}</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											Limited items available at this price
										</p>
										<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/owl-slide-->
				<div class="owl-slide cover" style="background-image: url('{{json_decode($slider_products[1]->images,1)[0]}}');">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="col-lg-6 static">
									<div class="slide-text white">
										<h2 class="owl-slide-animated owl-slide-title">{{$slider_products[1]->name}}</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											Limited items available at this price
										</p>
										<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/owl-slide-->
				<div class="owl-slide cover" style="background-image: url('{{json_decode($slider_products[2]->images,1)[0]}}');">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(255, 255, 255, 0.5)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="col-lg-12 static">
									<div class="slide-text text-center black">
										<h2 class="owl-slide-animated owl-slide-title">{{$slider_products[2]->name}}</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											Lightweight cushioning and durable support with a Phylon midsole
										</p>
										<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/owl-slide-->
				</div>
			</div>
			<div id="icon_drag_mobile"></div>
		</div>
		<!--/carousel-->

		<ul id="banners_grid" class="clearfix">
			<li>
				<a href="#0" class="img_container">
					<img src="img/banners_cat_placeholder.jpg" data-src="img/banner_1.jpg" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>{{ __('messages.men_collection')}}</h3>
						<div><span class="btn_1">{{ __('messages.shop')}}</span></div>
					</div>
				</a>
			</li>
			<li>
				<a href="#0" class="img_container">
					<img src="img/banners_cat_placeholder.jpg" data-src="img/banner_2.jpg" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>{{ __('messages.women_collection')}}</h3>
						<div><span class="btn_1">{{ __('messages.shop')}}</span></div>
					</div>
				</a>
			</li>
			<li>
				<a href="#0" class="img_container">
					<img src="img/banners_cat_placeholder.jpg" data-src="img/banner_3.jpg" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>{{ __('messages.kid_collection')}}</h3>
						<div><span class="btn_1">{{ __('messages.shop')}}</span></div>
					</div>
				</a>
			</li>
		</ul>
		<!--/banners_grid -->
		
		<div class="container margin_60_35">
			<div class="main_title">
				<h2>{{ __('messages.top_selling')}}</h2>
				<span>{{ __('messages.products')}}</span>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
			</div>
			<div class="row small-gutters">
				@if (isset($products[0]))									
				@foreach ($products as $product)									
					<div class="col-6 col-md-4 col-xl-3">				
						<div class="grid_item">
							<figure>
								<!-- <span class="ribbon off">-30%</span> -->
								<a href="{{route('single_page',['id'=>$product->id])}}">																			
									@foreach (json_decode($product->images,1) as $item)																			
									<img class="img-fluid lazy" src="{{$item}}" alt="">										
									@endforeach									
								</a>
								<!-- <div data-countdown="2019/05/15" class="countdown"></div> -->
							</figure>
							<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
							<a href="{{route('single_page',['id'=>$product->id])}}">
								<h3>{{$product->name}}</h3>
							</a>
							<div class="price_box">
								<span class="new_price">{{$product->discount_price}}</span>
								<span class="old_price">{{$product->price}}</span>
							</div>
							<ul>
								<li>
									@auth
										<a href="{{route('favourite',['product_id'=>$product->id])}}" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a>	
									@endauth
									@guest
										<a href="{{route('auth')}}" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a>
									@endguest									
								</li>								
								<li>
									@auth
										<a href="{{route('addtocart',['product_id'=>$product->id])}}" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>	
									@else
										<a href="{{route('auth')}}" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
									@endauth
									
								</li>
							</ul>
						</div>
						<!-- /grid_item -->
					</div>
				@endforeach
				@endif
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->

		<div class="featured lazy" data-bg="url('{{json_decode($slider_products[2]->images,1)[0]}}')">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<div class="container margin_60">
					<div class="row justify-content-center justify-content-md-start">
						<div class="col-lg-6 wow" data-wow-offset="150">
							<h3>{{$slider_products[2]->name}}</h3>
							<p>Lightweight cushioning and durable support with a Phylon midsole</p>
							<div class="feat_text_block">
								<div class="price_box">
									<span class="new_price">${{$slider_products[2]->discount_price}}</span>
									<span class="old_price">${{$slider_products[2]->price}}</span>
								</div>
								<a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /featured -->

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>{{ __('messages.more_seen')}}</h2>
				<span>{{ __('messages.products')}}</span>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
			</div>			
			<div class="owl-carousel owl-theme products_carousel">		
			@foreach ($all_view as $item)										
				<div class="item">
					<div class="grid_item">						
						<span class="ribbon new">{{ __('messages.new')}}</span>						
							<figure>
								<a href="{{route('single_page',['id'=>$product->id])}}">
								@foreach (json_decode($item->images,1) as $ite)
									<img class="owl-lazy" src="{{$ite}}">
								@endforeach
								</a>
							</figure>
							<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
							<a href="{{route('single_page',['id'=>$product->id])}}">
								<h3>{{$item->name}}</h3>
							</a>
							<div class="price_box">
								<span class="new_price">{{$item->discount_price}}</span>
							</div>

						<ul>
							<li>
								@auth
									<a href="{{route('favourite',['product_id'=>$product->id])}}" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a>	
								@else
									<a href="{{route('auth')}}" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a>
								@endauth								
							</li>
							<li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
							<li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
			@endforeach												
			</div>
			<!-- /products_carousel -->
		</div>
		<!-- /container -->
		
		<div class="bg_gray">
			<div class="container margin_30">
				<div id="brands" class="owl-carousel owl-theme">
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_1.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_2.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_3.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_4.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_5.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_6.png" alt="" class="owl-lazy"></a>
					</div><!-- /item --> 
				</div><!-- /carousel -->
			</div><!-- /container -->
		</div>
		<!-- /bg_gray -->

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>{{ __('messages.latest_news')}}</h2>
				<span>Blog</span>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<a class="box_news" href="blog.html">
						<figure>
							<img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-1.jpg" alt="" width="400" height="266" class="lazy">
							<figcaption><strong>28</strong>Dec</figcaption>
						</figure>
						<ul>
							<li>by Mark Twain</li>
							<li>20.11.2017</li>
						</ul>
						<h4>Pri oportere scribentur eu</h4>
						<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
					</a>
				</div>
				<!-- /box_news -->
				<div class="col-lg-6">
					<a class="box_news" href="blog.html">
						<figure>
							<img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-2.jpg" alt="" width="400" height="266" class="lazy">
							<figcaption><strong>28</strong>Dec</figcaption>
						</figure>
						<ul>
							<li>By Jhon Doe</li>
							<li>20.11.2017</li>
						</ul>
						<h4>Duo eius postea suscipit ad</h4>
						<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
					</a>
				</div>
				<!-- /box_news -->
				<div class="col-lg-6">
					<a class="box_news" href="blog.html">
						<figure>
							<img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-3.jpg" alt="" width="400" height="266" class="lazy">
							<figcaption><strong>28</strong>Dec</figcaption>
						</figure>
						<ul>
							<li>By Luca Robinson</li>
							<li>20.11.2017</li>
						</ul>
						<h4>Elitr mandamus cu has</h4>
						<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
					</a>
				</div>
				<!-- /box_news -->
				<div class="col-lg-6">
					<a class="box_news" href="blog.html">
						<figure>
							<img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-4.jpg" alt="" width="400" height="266" class="lazy">
							<figcaption><strong>28</strong>Dec</figcaption>
						</figure>
						<ul>
							<li>By Paula Rodrigez</li>
							<li>20.11.2017</li>
						</ul>
						<h4>Id est adhuc ignota delenit</h4>
						<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
					</a>
				</div>
				<!-- /box_news -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
@endsection