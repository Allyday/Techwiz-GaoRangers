@extends('layout_admin.base')

@section('content')

<h2 class="text-center display-5 mb-4">DANH SÁCH SẢN PHẨM</h2>
<div class="row">
    <div class="w-100 text-end">
       
        <a href="./admin_createProduct.php" class="btn btn-primary btn-rounded ml-auto" id="btn-add">Add</a>

    </div>
</div>
<div class=" mt-3">
    <table id="table" class="table hover row-border align-middle" style="width:100%">
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá nhập</th>
                <th>Giá gốc</th>
                <th>Giá khuyến mãi</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
         <tr>
            <td>000</td>
            <td>Pizza</td>
            <td>Fastfood</td>
            <td>02</td>
            <td>150000</td>
            <td>2000</td>
            <td>200000</td>
            <td><img id="img_load" src="../uploads/" style="height: 50px;width: 50px;margin: 0 auto;display: block;"></td>
            <td class="text-center">
                <a href ="./admin_editProduct.php?id=" title="edit" id="btn-edit-prd" class="btn-edit  btn-control text-success">
                    <i class="far fa-edit"></i>
                </a>
                <a  title="Xoa" class="btn-delete  btn-control text-danger" data-toggle="modal" data-target="#removeModal">
                <i class="far fa-times-circle"></i>
            </a>
            </td>
        </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá nhập</th>
                <th>Giá gốc</th>
                <th>Giá khuyến mãi</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </tfoot>
    </table>
</div>

<div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeModalLable">Xóa sản phẩm</h5>
            </div>
            <div class="modal-body">
                <h3>Bạn có muốn xóa sản phẩm?</h3>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-secondary btn-comfirm" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary btn-comfirm">Yes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var table = $('.table').DataTable({
            responsive: true,
            className: 'dt-body-center',
            "pageLength": 50
        });

        var row;
        var id = "";

        // Remove record
        $(".btn-comfirm").click(function(event) {
            var yes = $(this).text();
            if (yes == 'Yes') {
                $.ajax({
                    url: "admin_productsAll.php",
                    type: "POST",
                    cache: false,
                    data: {
                        deleteId: id
                    },
                    success: function(data) {
                        row.remove().draw(false)
                        row = null;
                    }
                });

           
                $('#removeModal').modal('hide');
            }
        });
        $.fn.setEventChangePage = function() {
            $(".btn-delete").click(function(event) {
                row = table.row($(this).parents('tr'));
                id = row.data()[0];
            });
        }


        $.fn.setEventChangePage();
        $('.paginate_button').on('click', function() {
            $.fn.setEventChangePage();
        });
    });
</script>
@endsection