@extends('layout-admin')
@section('admin-content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    @foreach($edit_product as $key => $pro)
                    <form enctype="multipart/form-data" id="form-add-product">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="product_name" class="form-control" id="productName" value="{{$pro->product_name}}">
                        </div>
                                <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" value="{{$pro->product_price}}" name="product_price" class="form-control" id="productPrice" >
                        </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" name="product_image" class="form-control" id="productImage">
                            <img src="{{URL::to('upload/product/'.$pro->product_image)}}" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="product_desc" id="productDesc">{{$pro->product_desc}}</textarea>
                        </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="product_content" id="productContent" >{{$pro->product_content}}</textarea>
                        </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                <select name="product_cate" id="categoryId" class="form-control input-sm m-bot15">
                                @foreach($cate_product as $key => $cate)
                                    @if($cate->category_id==$pro->category_id)
                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @else
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endif
                                @endforeach
                                    
                            </select>
                        </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu</label>
                                <select name="product_brand" id="brandId" class="form-control input-sm m-bot15">
                                @foreach($brand_product as $key => $brand)
                                        @if($cate->category_id==$pro->category_id)
                                    <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @else
                                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endif
                                @endforeach
                                    
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                    
                            </select>
                        </div>
                        <button type="submit" name="add_product" class="btn btn-info update_product">Cập nhật sản phẩm</button>
                    </form>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
    <script>
    $(document).ready(function() {
        $('.update_product').on('click', function(event) {
            
            event.preventDefault();

            var form = $('#form-add-product')[0];
            var data = new FormData(form);
            data.append('product_name', $('#productName').val());
            data.append('category_id', $('#categoryId').val());
            data.append('brand_id', $('#brandId').val());
            data.append('product_desc', $('#productDesc').val());
            data.append('product_content', $('#productContent').val());
            data.append('product_price', $('#productPrice').val());
            data.append('product_image', $('#productImage').val());

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "{{route('api.update-product', ["product_id" => $pro->product_id])}}",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function (data) {
                    alert('Cập nhật sản phẩm thành công!')

                },
                error: function (e) {

                }
            });
        });
    });
</script>
@endsection