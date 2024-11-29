@extends('layout-admin')
@section('admin-content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phẩm
            </header>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @elseif(session()->has('error'))
                    <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="panel-body">

                <div class="position-center">
                    <form enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="product_name" class="form-control" id="productName" placeholder="Tên danh mục">
                        </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" data-validation="number" data-validation-error-msg="Làm ơn điền số tiền" name="product_price" class="form-control" id="productPrice" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" name="product_image" class="form-control" id="productImage">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize: none"  rows="8" class="form-control" name="product_desc" id="productDesc" placeholder="Mô tả sản phẩm"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="product_content"  id="productContent" placeholder="Nội dung sản phẩm"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                            <select name="product_cate" id="categoryId" class="form-control input-sm m-bot15">
                                @foreach($cate_product as $key => $cate)
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endforeach
                                    
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu</label>
                            <select name="product_brand" id="brandId" class="form-control input-sm m-bot15">
                                @foreach($brand_product as $key => $brand)
                                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
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
                        <button name="add_product" class="btn btn-info add_product">Thêm sản phẩm</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.add_product').on('click', function(event) {
            event.preventDefault();
            const data = {
                product_name: $('#productName').val(),
                category_id: $('#categoryId').val(),
                brand_id: $('#brandId').val(),
                product_desc: $('#productDesc').val(),
                product_content: $('#productContent').val(),
                product_price: $('#productPrice').val(),
                product_image: $('#productImage').val()[0].files,
                product_status: $('select[name="product_status"]').val(),
                _token: $('input[name="_token"]').val()
            };

            let formData = new FormData();
            for (let key in data) {
                formData.append(key, data[key]);
            }

            $.ajax({
                url: '{{route('api.save-product')}}',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function(response) {
                    $('#message').text(response.message);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    $('#message').text('Có lỗi xảy ra!');
                }
            });
        });
    });
</script>
@endsection