@extends('user.layouts.base')
@section('main')
    <main class="bg_gray">
		<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Category</a></li>
					<li>Page active</li>
				</ul>
			</div>
			<h1>Cart page</h1>
		</div>
		<!-- /page_header -->
		<table class="table table-striped cart-list">
							<thead>
								<tr>
									<th>
										Product
									</th>
									<th>
										Price
									</th>									
									<th>
                                        Delete
									</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($wishlist as $item)                                                                    
                                    <tr>
                                        <td>
                                            <div class="thumb_cart">
                                                <img src="{{json_decode($item->images,1)[0]}}" class="lazy" style="height: 50px;" alt="Image">
                                            </div>
                                            <span class="item_cart">{{$item->name}}</span>
                                        </td>
                                        <td>
                                            <strong>{{$item->price}}</strong>
                                        </td>									
                                        <td class="options">
                                            <a href="{{route('del.from.wishlist',['wishlist_id'=>$item->id])}}"><i class="ti-trash"></i></a>
                                        </td>
                                    </tr>			
                                @endforeach					
							</tbody>
						</table>

						<div class="row add_top_30 flex-sm-row-reverse cart_actions">
						<div class="col-sm-4 text-end">
							<button type="button" class="btn_1 gray">Update Cart</button>
						</div>
							<div class="col-sm-8">
							<div class="apply-coupon">
								<div class="form-group">
									<div class="row g-2">
										<div class="col-md-6"><input type="text" name="coupon-code" value="" placeholder="Promo code" class="form-control"></div>
										<div class="col-md-4"><button type="button" class="btn_1 outline">Apply Coupon</button></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /cart_actions -->
	
		</div>
		<!-- /container -->
		
		<div class="box_cart">
			<div class="container">
			<div class="row justify-content-end">
				<div class="col-xl-4 col-lg-4 col-md-6">
			<ul>
				<li>
					<span>Subtotal</span> $240.00
				</li>
				<li>
					<span>Shipping</span> $7.00
				</li>
				<li>
					<span>Total</span> $247.00
				</li>
			</ul>
			<a href="cart-2.html" class="btn_1 full-width cart">Proceed to Checkout</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /box_cart -->
		
	</main>
@endsection