@extends('layout')
@section("content")

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				<li class="active">Giỏ hàng của bạn</li>
			</ol>
		</div>
		@if(session()->has('message'))
			<div class="alert alert-success">
				{{ session()->get('message') }}
			</div>
		@elseif(session()->has('error'))
				<div class="alert alert-danger">
				{{ session()->get('error') }}
			</div>
		@endif

		<div class="table-responsive cart_info">
			<form action="{{url('/update-cart')}}" method="POST">
				{{csrf_field()}}
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
						<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@if(Session::get('cart')==true)
							<?php
								$total = 0;
							?>
							@foreach (Session::get('cart') as $key =>$cart )
								<?php
									$subtotal = $cart['product_price'] * $cart['product_qty'];
									$total += $subtotal;
								?>
								<tr>
									<td class="cart_product">
										<a href=""><img src="upload/product/{{ $cart['product_image']}}" width="90" alt="{{$cart['product_name']}}"></a>
									</td>
									<td class="cart_description">
										<h4><a href=""></a></h4>
										<p>{{$cart['product_name']}}</p>
									</td>
									<td class="cart_price">
										<p>{{ number_format(floatval($cart['product_price'])).' '.'VNĐ'}}</p>
									</td>
									<td class="cart_quantity">
										<div class="cart_quantity_button">
											<input class="cart_quantity_" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}">
										</div>
									</td>
									<td class="cart_total">
										<p class="cart_total_price">{{ number_format(floatval($subtotal)).' '.'VNĐ'}}</p>
									</td>
									<td class="cart_delete">
										<a class="cart_quantity_delete" href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
									</td>
								</tr>
							@endforeach
							<tr>
								<td><input style="font-size:14px" type="submit" name="update_qty" value="Cập nhật" class="update btn-default btn-sm"></td>
								<td><a class="btn btn-default update" href="{{url('/del-all-product')}}">Xóa tất cả</a></td>
								<td>
									<?php
										$customer_id = Session::get('customer_id');
										if($customer_id!=NULL){ 
									?>
										<a class="btn btn-default update" href="{{route('checkout')}}">Thanh toán</a>
									<?php
										}else{
									?>
										<a class="btn btn-default update" href="{{URL::to("/login-checkout")}}">Thanh toán</a>
									<?php 
										}
									?>
								</td>
								<td></td>
								<td>
									<span>Tổng tiền: <span>{{ number_format(floatval($total)).' '.'VNĐ'}}</span></span>
								
								</td>
							</tr>
						@else
						<tr>
							<td colspan="5"><center>
								<?php
									echo'Chưa có sản phẩm nào trong giỏ hàng';
								?>
							</center></td>
						</tr>
						@endif
					</tbody>
				</table>
			</form>
		</div>
	</div>
</section> <!--/#cart_items-->


@endsection


