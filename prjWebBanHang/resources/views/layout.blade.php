<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="/fontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="/fontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="/fontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="/fontend/css/price-range.css" rel="stylesheet">
    <link href="/fontend/css/animate.css" rel="stylesheet">
    <link href="/fontend/css/sweetalert.css" rel="stylesheet">
	<link href="/fontend/css/main.css" rel="stylesheet">
	<link href="/fontend/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/fontend/js/html5shiv.js"></script>
    <script src="/fontend/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="/fontend/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/fontend/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/fontend/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/fontend/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/fontend/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{URL::to('/trang-chu')}}"><img src="/fontend/images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">

								<li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<?php
                                   	$customer_id = Session::get('customer_id');
                                   	if($customer_id!=NULL){ 
                                ?>
                                  	<li><a href="{{URL::to("/logout-home")}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
                                <?php
                            		}else{
                                ?>
                                 	<li><a href="{{URL::to("/login")}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                <?php 
                             		}
                                ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
								<li class="dropdown"><a href="{{URL::to('/san-pham')}}">Sản phẩm</a>
                                </li>
								<?php
                                   	$customer_id = Session::get('customer_id');
									$shipping_id = Session::get('shipping_id');
									if($customer_id!=NULL && $shipping_id==NULL){ 
                                ?>
                                  	<li><a href="{{route('checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
								<?php
									}elseif($customer_id!=NULL && $shipping_id!=NULL){
								?>
									<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                <?php
                            		}else{
                                ?>
                                 	<li><a href="{{route('login')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                <?php 
                             		}
                                ?>
							</ul>
						</div>
					</div>
					<div class="col-sm-5">
						<form action="{{URL::to('/tim-kiem')}}" method="POST">
							{{csrf_field()}}
							<div class="search_box pull-right">
								<input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm"/>
								<input type="submit" name="search_item" class="btn btn-primary btn-sm" value="Tìm kiếm" style="margin-top:0; color:#000"/>
									
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	@yield('content')
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="{{URL::to('/san-pham')}}">
									<div class="iframe-img">
										<img src="/fontend/images/footer1.webp" alt="" />
									</div>
								</a>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="{{URL::to('/san-pham')}}">
									<div class="iframe-img">
										<img src="/fontend/images/footer2.webp" alt="" />
									</div>
								</a>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="{{URL::to('/san-pham')}}">
									<div class="iframe-img">
										<img src="/fontend/images/footer3.webp" alt="" />
									</div>
								</a>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="{{URL::to('/san-pham')}}">
									<div class="iframe-img">
										<img src="/fontend/images/footer4.webp" alt="" />
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="/fontend/images/map.png" alt="" />
							<p>Km 10, đường Nguyễn Trãi, quận Thanh Xuân, thành phố Hà Nội</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2024 website đồ án phát triển phần mềm hướng dịch vụ</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="/fontend/js/jquery.js"></script>
	<script src="/fontend/js/bootstrap.min.js"></script>
	<script src="/fontend/js/jquery.scrollUp.min.js"></script>
	<script src="/fontend/js/price-range.js"></script>
    <script src="/fontend/js/jquery.prettyPhoto.js"></script>
    <script src="/fontend/js/main.js"></script>
    <script src="/fontend/js/sweetalert.min.js"></script>


	<script type="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart').click(function(){
				var id = $(this).data('id_product');
				var cart_product_id = $('.cart_product_id_' + id).val();
				var cart_product_name = $('.cart_product_name_' + id).val();
				var cart_product_image = $('.cart_product_image_' + id).val();
				var cart_product_price = $('.cart_product_price_' + id).val();
				var cart_product_qty = $('.cart_product_qty_' + id).val();
				var _token = $('input[name="_token"]').val();

				$.ajax({
					url: '{!!url('/add-cart')!!}',
                    method: 'POST',
					data:{
						cart_product_id:cart_product_id,
						cart_product_name:cart_product_name,
						cart_product_image:cart_product_image,
						cart_product_price:cart_product_price,
						cart_product_qty:cart_product_qty,
						_token:_token
					},
					success:function(data){
						swal({
							title: "Đã thêm sản phẩm vào giỏ hàng",
							text: "Bạn có muốn thanh toán?",
							showCancelButton: true,
							cancelButtonText: "Xem tiếp",
							confirmButtonClass: "btn-success",
							confirmButtonText: "Đi đến giỏ hàng",
							closeOnConfirm: false
						},
						function() {
							window.location.href = "{{url('/gio-hang')}}";
						});
					}
				});
			});

			$('.order-place').click(function(){
				var shipping_email = $('#shipping_email').val();
				var shipping_name = $('#shipping_name').val();
				var shipping_address = $('#shipping_address').val();
				var shipping_phone = $('#shipping_phone').val();
				$.ajax({
					url: '{!!url('/order-place')!!}',
                    method: 'POST',
					data:{
						shipping_email:shipping_email,
						shipping_name:shipping_name,
						shipping_address:shipping_address,
						shipping_phone:shipping_phone
					},
					success:function(data){
						Swal.fire("Đặt hàng thành công!");
					}
				});
			});
        });
          
    </script>
</body>
</html>