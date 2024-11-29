@extends('layout-admin')
@section('admin-content')
  <div class="table-agile-info">
<div class="panel panel-default">
  <div class="panel-heading">
    Danh sách sản phẩm
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
          
          <th>Tên sản phẩm</th>
          <!-- <th>Số lượng</th>
          <th>Slug</th> -->
          <th>Giá</th>
          <th>Hình sản phẩm</th>
          <th>Danh mục</th>
          <th>Thương hiệu</th>
          <th>Hiển thị</th>
          <th style="width:30px;"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($all_product as $key => $pro)
        <tr>
          <td>{{ $pro->product_name }}</td>
          <td>{{ $pro->product_price }}</td>
          <td><img src="uploads/product/{{ $pro->product_image }}" height="100" width="100"></td>
          <td>{{ $pro->category_name }}</td>
          <td>{{ $pro->brand_name }}</td>

          <td><span class="text-ellipsis">
            <?php
              if($pro->product_status==0){
                ?>
                  <a href="{{URL::to('/active-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
              }else{
                ?>  
                  <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
              }
            ?>
          </span></td>
          
          <td>
            <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
              <i class="fa fa-pencil-square-o text-success text-active"></i></a>
            <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
              <i class="fa fa-times text-danger text"></i>
            </a>
          </td>
        </tr>
        @endforeach
          
         
      </tbody>
    </table>
  </div>
  
</div>
</div>
@endsection