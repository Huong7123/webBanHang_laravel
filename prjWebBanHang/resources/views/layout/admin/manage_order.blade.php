@extends('layout-admin')
@section('admin-content')

<!--main content start-->
<div class="panel panel-default">
  <div class="panel-heading">
    Danh sách đơn hàng
  </div>
  <div class="table-responsive">
    @if(session()->has('message'))
			<div class="alert alert-success">
				{{ session()->get('message') }}
			</div>
		@elseif(session()->has('error'))
				<div class="alert alert-danger">
				{{ session()->get('error') }}
			</div>
		@endif
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
          <th>Tên khách hàng</th>
          <th>Số điện thoại</th>
          <th>Địa chỉ</th>
          <th>Tổng tiền</th>
          <th>Hình thức thanh toán</th>
          <th>Ngày đặt</th>
          <th>Tình trạng</th>
          <th style="width:30px;"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $all_order as $key => $order )
          <tr>
            <td>{{ $order -> shipping_name}}</td>
            <td>{{ $order -> shipping_phone}}</td>
            <td>{{ $order -> shipping_address}}</td>
            <td>{{ $order -> order_total}}</td>
            <td>{{ $order -> payment_method	}}</td>
            <td>{{ $order -> created_at	}}</td>
            <td>{{ $order -> order_status}}</td>
            <td>
              <a href="{{URL::to('/view-order/'.$order->order_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection