@extends('layout')
@section('content')

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
                @foreach ($product_details as $key =>$value)
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="/uploads/product/{{ $value->product_image }}" alt="" />
                            </div>
                            <div id="similar-product" class="carousel slide" data-ride="carousel">
                                
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <a href=""><img src="/fontend/images/product-details/similar1.jpg" alt=""></a>
                                            <a href=""><img src="/fontend/images/product-details/similar2.jpg" alt=""></a>
                                            <a href=""><img src="/fontend/images/product-details/similar3.jpg" alt=""></a>
                                        </div>
                                    </div>

                                    
                            </div>

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="/fontend/images/product-details/new.jpg" class="newarrival" alt="" />
                                <h2>{{$value -> product_name}}</h2>
                                <p>Mã sản phẩm: {{$value -> product_id}}</p>
                                <img src="/fontend/images/product-details/rating.png" alt="" />
                                <form>
                                    {{ csrf_field()}}
                                    <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                                    <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                                    <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                                    <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                                    <span>
                                        <span>{{ number_format(floatval($value->product_price)).' '.'VNĐ'}}</span>
                                        <label>Quantity:</label>
                                        <input class="cart_product_qty_{{$value->product_id}}" name="qty" type="number" min="1" value="1" />
                                        <input name="productid_hidden" type="hidden" min="1" value="{{$value -> product_id}}" />
                                        <button type="button"  data-id_product="{{$value->product_id}}" name="add-to-cart" class="btn btn-fefault cart add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Thêm giỏ hàng
                                        </button>
                                    </span>
                                </form>
                                <p><b>Tình trạng:</b> Mới 100%</p>
                                <p><b>Danh mục:</b> {{$value -> category_name}}</p>
                                <p><b>Thương hiệu:</b> {{$value -> brand_name}}</p>
                                <a href=""><img src="/fontend/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->
                
				
                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
                                <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="details" >
                                <p>{!!$value->product_desc!!}</p>
                            </div>
                            <div class="tab-pane fade" id="companyprofile" >
                                <p>{!!$value->product_content!!}</p>
                            </div>
                            
                        </div>
                    </div><!--/category-tab-->
                @endforeach
				
				<div class="recommended_items"><!--recommended_items-->
					<h2 class="title text-center">Sản phẩm liên quan</h2>
					
					<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="item active">
                                @foreach ($related as $key => $lienquan)
                                    <a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}">
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/uploads/product/{{ $lienquan->product_image }}" alt="" />
                                                        <h2>{{ number_format(floatval($lienquan->product_price)).' '.'VNĐ'}}</h2>
                                                        <p>{{$lienquan -> product_name}}</p>
                                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach	
							</div>
						</div>		
					</div>
				</div><!--/recommended_items-->
				
			</div>
		</div>
	</div>
</section>

@endsection
