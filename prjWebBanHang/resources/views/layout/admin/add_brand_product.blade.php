@extends('layout-admin')
@section('admin-content')
<div class="row">
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Thêm thương hiệu sản phẩm
        </header>
        <div class="panel-body">

            <div class="position-center">
                <form>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên thương hiệu</label>
                        <input type="text" name="brand_product_name" class="form-control" id="brandName" placeholder="Tên thương hiệu">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                        <textarea style="resize: none" rows="8" class="form-control" name="brand_product_desc" id="brandDesc" placeholder="Mô tả thương hiệu"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="brand_product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                                
                        </select>
                    </div>
                    <button name="add_brand_product" class="btn btn-info add_brand">Thêm thương hiệu</button>
                </form>
            </div>

        </div>
    </section>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.add_brand').on('click', function(event) {
            event.preventDefault();
            const data = {
                brand_product_name: $('#brandName').val(),
                brand_product_desc: $('#brandDesc').val(),
                brand_product_status: $('select[name="brand_product_status"]').val(),
                _token: $('input[name="_token"]').val()
            };

            $.ajax({
                url: "{{route('api.save-brand-product')}}",
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function(response) {
                    alert('Thêm sản phẩm thành công!')
                },
                error: function(xhr, status, error) {
                    
                }
            });
        });
    });
</script>

@endsection