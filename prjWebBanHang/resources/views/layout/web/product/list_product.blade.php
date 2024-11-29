@extends('layout')
@section('content')



<section id="advertisement">
	<div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="active">Sản phẩm</li>
            </ol>
        </div>
		<div class="row">
			<div class="col-sm-6">
				<img src="/fontend/images/paner_product1.webp" alt="" />
			</div>
			<div class="col-sm-6">
				<img src="/fontend/images/paner_product2.webp" alt="" />
			</div>
		</div>
	</div>
</section>

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
			
			<div class="col-sm-9 padding-right" style="text-align: center;">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Tất cả sản phẩm</h2>
					@foreach ($all_product as $key =>$product)
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
                                                <img src="/uploads/product/{{ $product->product_image }}" alt="" />
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
				</div><!--features_items-->
                
			</div>
		</div>
	</div>
</section>

@endsection