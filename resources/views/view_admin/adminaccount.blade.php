@extends('layout_admin.base')

@section('content')

<h2 class="text-center display-5 mb-4">DANH SÁCH TÀI KHOẢN</h2>
<div class=" mt-6">
   <table id="tableCustomer" class="table hover row-border" style="width:100%">
      <thead>
         <tr>
            <th>User Name</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Picture</th>
            <th>Mail</th>
            <th>Phone Number</th>
            <th></th>
         </tr>
      </thead>
      <tbody>
        @foreach ($dsusers as $row)
            <tr>
                <td>{{ $row->userName }}</td>
                <td>{{ $row->firstName }}</td>
                <td>{{ $row->lastName }}</td>
                <td>{{ $row->gender }}</td>
                <td><img src="{{ $row->picture }}" alt="{{ $row->userName }}" style="max-width:100px"></td>
                <td>{{ $row->mail }}</td>
                <td>{{ $row->phoneNumber }}</td>
                <td class="text-center">
                    <a href="{{ route('setting', $row->id) }}" class="btn-delete btn-control text-danger">
                     <i class="fas fa-cog"></i>
                       </a>
                </td>
            </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
            <th>User Name</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Picture</th>
            <th>Mail</th>
            <th>Phone Number</th>
            <th></th>
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
