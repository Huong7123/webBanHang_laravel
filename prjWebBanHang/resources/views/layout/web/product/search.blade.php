@extends('layout')
@section('content')

<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					
					<div class="carousel-inner">
						<div style="padding: 0 50px;" class="item active">
							<div class="col-sm-12">
								<img style="width: 100%;" src="/fontend/images/slider1.webp" class="girl img-responsive" alt="" />
							</div>
						</div>
						<div style="padding: 0 50px;" class="item">
							<div class="col-sm-12">
								<img style="width: 100%;" src="/fontend/images/slider2.jpg" class="girl img-responsive" alt="" />
							</div>
						</div>
						
						<div style="padding: 0 50px;" class="item">
							<div class="col-sm-12">
								<img style="width: 100%;" src="/fontend/images/slider3.webp" class="girl img-responsive" alt="" />
							</div>
						</div>
						<div style="padding: 0 50px;" class="item">
							<div class="col-sm-12">
								<img style="width: 100%;" src="/fontend/images/slider4.webp" class="girl img-responsive" alt="" />
							</div>
						</div>
						
					</div>
					
					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
				
			</div>
		</div>
	</div>
	</section><!--/slider-->

	<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Danh mục sản phẩm</h2>
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						@foreach ($category as $key =>$cate)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate -> category_name}}</a></h4>
								</div>
							</div>
						@endforeach
					</div><!--/category-products-->
				
					<div class="brands_products"><!--brands_products-->
						<h2>Thương hiệu sản phẩm</h2>
						<div class="brands-name">
							<ul class="nav nav-pills nav-stacked">
								@foreach ($brand as $key =>$brand)
									<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}"> <span class="pull-right"></span>{{$brand -> brand_name}}</a></li>
								@endforeach
							</ul>
						</div>
					</div><!--/brands_products-->
					
				</div>
			</div>
			
			<div class="col-sm-9 padding-right">
				<div class="features_items">
					<h2 class="title text-center">Kết quả tìm kiếm</h2>
					@foreach ($search_product as $key =>$product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<form>
											{{ csrf_field()}}
											<input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
											<input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
											<input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
											<input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
											<input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

											<a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
												<img src="uploads/product/{{ $product->product_image }}" alt="" />
												<h2>{{ number_format(floatval($product->product_price)).' '.'VNĐ'}}</h2>
												<p>{{$product->product_name}}</p>
											</a>
											<button type="button" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>

@endsection