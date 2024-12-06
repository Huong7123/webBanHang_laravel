@extends('layout-admin')
@section('admin-content')
<div class="row">
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Cập nhật danh mục sản phẩm
        </header>
        <?php
            $message = Session::get('message');
            if($message){
                echo '<span class="text-alert">'.$message.'</span>';
                Session::put('message',null);
            }
        ?>
        <div class="panel-body">
            @foreach($edit_category_product as $key => $edit_value)
                <div class="position-center">
                    <form>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" value="{{$edit_value->category_name}}" name="category_product_name" class="form-control" id="edit-categoryName" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="category_product_desc" id="edit-categoryDesc" >{{$edit_value->category_desc}}</textarea>
                        </div>
                        <button name="update_category_product" class="btn btn-info update-category">Cập nhật danh mục</button>
                    </form>
                </div>
            @endforeach
        </div>
    </section>
</div>
<script>
    $(document).ready(function() {
        $('.update-category').on('click', function(e) {
            event.preventDefault();
            const data = {
                category_product_name: $('#edit-categoryName').val(),
                category_product_desc: $('#edit-categoryDesc').val(),
                _token: $('input[name="_token"]').val()
            };
            $.ajax({
                url: '{{ route("api.update-category-product", ["category_product_id" => $edit_value->category_id]) }}',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function(response) {
                    alert("Cập nhật danh mục sản phẩm thành công");
                },
                error: function(xhr) {
                    
                }
            });
        });
    });
</script>
@endsection