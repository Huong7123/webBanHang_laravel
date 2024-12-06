@extends('layout-admin')
@section('admin-content')
<div class="row">
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Cập nhật thương hiệu sản phẩm
        </header>
        <?php
            $message = Session::get('message');
            if($message){
                echo '<span class="text-alert">'.$message.'</span>';
                Session::put('message',null);
            }
        ?>
        <div class="panel-body">
            @foreach($edit_brand_product as $key => $edit_value)
                <div class="position-center">
                    <form>
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên thương hiệu</label>
                        <input type="text" value="{{$edit_value->brand_name}}" name="brand_product_name" class="form-control" id="edit-brandName" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                        <textarea style="resize: none" rows="8" class="form-control" name="brand_product_desc" id="edit-brandDesc" >{{$edit_value->brand_desc}}</textarea>
                    </div>
                    <button type="submit" name="update_brand_product" class="btn btn-info update-brand">Cập nhật thương hiệu</button>
                    </form>
                </div>
            @endforeach
        </div>
    </section>
</div>
<script>
    $(document).ready(function() {
        $('.update-brand').on('click', function(e) {
            event.preventDefault();
            const data = {
                brand_product_name: $('#edit-brandName').val(),
                brand_product_desc: $('#edit-brandDesc').val(),
                _token: $('input[name="_token"]').val()
            };
            $.ajax({
                url: '{{ route("api.update-brand-product", ["brand_product_id" => $edit_value->brand_id]) }}',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function(response) {
                    alert("Cập nhật thương hiệu sản phẩm thành công");
                },
                error: function(xhr) {
                    
                }
            });
        });
    });
</script>
@endsection