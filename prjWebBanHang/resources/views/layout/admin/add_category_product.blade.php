@extends('layout-admin')
@section('admin-content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm danh mục sản phẩm
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
                    <form>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" name="category_product_name" class="form-control" id="categoryName" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="category_product_desc" id="categoryDesc" placeholder="Mô tả danh mục"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="category_product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button name="add_category_product" class="btn btn-info add_category">Thêm danh mục</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.add_category').on('click', function(event) {
            event.preventDefault();
            const data = {
                category_product_name: $('#categoryName').val(),
                category_product_desc: $('#categoryDesc').val(),
                category_product_status: $('select[name="category_product_status"]').val(),
                _token: $('input[name="_token"]').val()
            };

            $.ajax({
                url: "{{route('api.save-category-product')}}",
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