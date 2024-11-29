@extends('layout-admin')
@section('admin-content')

<!--main content start-->
<div class="panel panel-default">
  <div class="panel-heading">
    Danh sách danh mục sản phẩm
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
          
          <th>Tên danh mục</th>
          <th>Hiển thị</th>
          <th style="width:30px;"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $all_category_product as $key => $cate_pro )
          <tr>
            <td>{{ $cate_pro -> category_name}}</td>
            <td><span class="text-ellipsis">
              <?php
                if ($cate_pro -> category_status ==0){
                  ?>
                    <a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                  <?php
                }else{
                  ?>
                    <a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                  <?php
                }
              ?>
            </span></td>
            <td>
              <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
</div>

@endsection