@extends('layout-admin')
@section('admin-content')

<!--main content start-->
<div class="panel panel-default">
  <div class="panel-heading">
    Danh sách thương hiệu sản phẩm
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
          
          <th>Tên thương hiệu</th>
          <th>Hiển thị</th>
          <th style="width:30px;"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $all_brand_product as $key => $cate_pro )
          <tr>
            <td>{{ $cate_pro -> brand_name}}</td>
            <td><span class="text-ellipsis">
              <?php
                if ($cate_pro -> brand_status ==0){
                  ?>
                    <a href="{{URL::to('/active-brand-product/'.$cate_pro->brand_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                  <?php
                }else{
                  ?>
                    <a href="{{URL::to('/unactive-brand-product/'.$cate_pro->brand_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                  <?php
                }
              ?>
            </span></td>
            <td>
              <a href="{{URL::to('/edit-brand-product/'.$cate_pro->brand_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa thương hiệu này ko?')" href="{{URL::to('/delete-brand-product/'.$cate_pro->brand_id)}}" class="active styling-edit" ui-toggle-class="">
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