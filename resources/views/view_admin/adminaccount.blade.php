@extends('layout_admin.base')

@section('content')

<h2 class="text-center display-5 mb-4">DANH SÁCH TÀI KHOẢN</h2>
<div class=" mt-6">
   <table id="tableCustomer" class="table hover row-border" style="width:100%">
      <thead>
         <tr>
            <th>Tên đăng nhập</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Ngày đăng ký</th>
            <th>Thao tác</th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <td>admin</td>
            <td>09999999</td>
            <td>test@test.gmail.com</td>
            <td>10/10/2000</td>
            <td class="text-center">
                <a href="" class="btn-delete btn-control text-danger">
                    <i class="far fa-times-circle"></i>
                </a>
            </td>
        </tr>
      </tbody>
      <tfoot>
         <tr>
            <th>Tên đăng nhập</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Ngày đăng ký</th>
            <th>Thao tác</th>
         </tr>
      </tfoot>
   </table>
</div>

<div class="modal fade" id="comfirmModal" tabindex="-1" aria-labelledby="comfirmModalLable" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="comfirmModalLable">Thêm loại sản phẩm</h5>
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
        $('.table').DataTable({
            responsive: true,
            className: 'dt-body-center',
            "pageLength": 50
        });
    });
</script>
@endsection