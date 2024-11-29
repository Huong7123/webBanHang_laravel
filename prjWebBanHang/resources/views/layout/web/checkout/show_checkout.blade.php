@extends('layout')
@section("content")

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				<li class="active">Thanh toán</li>
			</ol>
		</div><!--/breadcrums-->
		<div class="shopper-informations">
			<div class="row">
				<div class="col-sm-12 clearfix">
					<div class="bill-to">
						<p>Thông tin đơn hàng</p>
						<div style="width: 100%" class="form-one">
							<form action="{{URL::to('/order-place')}}" method="POST">
								{{csrf_field()}}
								<input type="text" id="shipping_email" name="shipping_email" placeholder="Email*">
								<input type="text" id="shipping_name" name="shipping_name" placeholder="Họ và tên *">
								<input type="text" id="shipping_address" name="shipping_address" placeholder="Địa chỉ *">
								<input type="text" id="shipping_phone" name="shipping_phone" placeholder="Phone">
								<textarea name="shipping_notes"  placeholder="Ghi chú đơn hàng" rows="16"></textarea>
								<div class="review-payment">
									<h2>Xem lại giỏ hàng</h2>
								</div>
								<div class="table-responsive cart_info">
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
															<img src="uploads/product/{{ $cart['product_image']}}" width="90" alt="{{$cart['product_name']}}">
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
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td>
														<span style="font-size:18px;">
															Tổng tiền: 
															<span id="order_total">{{ number_format(floatval($total)).' '.'VNĐ'}}</span>
														</span>
													</td>
													<td></td>
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
								</div>
								<div class="review-payment">
									<h2>Hình thức thanh toán</h2>
								</div>
								<div class="payment-options" style="margin-bottom:0">
									<span>
										<label><input name="paymen_option" value="Thanh toán khi nhận hàng" type="checkbox"> Thanh toán khi nhận hàng</label>
									</span>
									<span>
										<label><input name="paymen_option" value="ví điện tử" type="checkbox"> Ví điện tử</label>
									</span>
									<span>
										<label><input name="paymen_option" value="tài khoản ngân hàng" type="checkbox"> Tài khoản ngân hàng</label>
									</span>
								</div>
								<input style="font-size:14px" type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm order-place">
							</form>
						</div>
					</div>
				</div>					
			</div>
		</div>
	</div>
</section> <!--/#cart_items-->

@endsection



