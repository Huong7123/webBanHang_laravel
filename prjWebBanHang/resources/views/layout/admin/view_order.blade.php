@extends('layout-admin')
@section('admin-content')

<!--main content start-->
<div class="panel panel-default">
  <div class="panel-heading">
    Thông tin khách hàng
  </div>
  <div class="table-responsive">
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
          <th>Tên khách hàng</th>
          <th>Số điện thoại</th>
          <th>Địa chỉ</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $all_order[0] -> shipping_name}}</td>
          <td>{{ $all_order[0] -> shipping_phone}}</td>
          <td>{{ $all_order[0] -> shipping_address}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<br>
<div class="panel panel-default">
  <div class="panel-heading">
    Chi tiết đơn hàng 
  </div>
  <div class="table-responsive">
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
          <th>Tên sản phẩm</th>
          <th>Đơn giá</th>
          <th>Số lượng</th>
          <th>Hình thức thanh toán</th>
        </tr>
      </thead>
      <tbody>
      @foreach ( $all_order as $key => $order )
        <tr>
          <td>{{ $order -> product_name}}</td>
          <td>{{ $order -> product_price}}</td>
          <td>{{ $order -> product_sales_quantity}}</td>
          <td>{{ $order -> payment_method}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection