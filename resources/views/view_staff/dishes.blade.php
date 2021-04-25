@extends('layout_admin.base')

@section('content')

<h2 class="text-center display-5 mb-4">DANH SÁCH MÓN ĂN</h2>
<div class="row">
   <div class="w-100 text-end">
      
       <a href="dish/create" class="btn btn-primary btn-rounded ml-auto">Thêm mới</a>

   </div>
</div>
<div class=" mt-6">
   <table id="tableCustomer" class="table hover row-border" style="width:100%">
      <thead>
         <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Restaurant</th>
            <th>Category</th>
            <th>Picture</th>
            <th></th>
         </tr>
      </thead>
      <tbody>
        @foreach ($dsdishes as $row)
            <tr>
                <td>{{ $row->name }}</td>
                <td>{{ $row->description }}</td>
                <td>{{ $row->price }}</td>
                <td>{{ $row->categoryName }}</td>
                <td>{{ $row->restaurantName }}</td>
                <td><img src="{{ $row->photo }}" alt="{{ $row->name }}" style="max-width:100px"></td>
                <td class="text-center">
                  <a href ="{{$row->id}}/edit" class="btn-edit  btn-control text-success">
                     <i class="far fa-edit"></i>
                  </a>
                    <a href="" class="btn-delete btn-control text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Restaurant</th>
            <th>Category</th>
            <th>Picture</th>
            <th></th>
         </tr>
      </tfoot>
   </table>
</div>

<div class="modal fade" id="comfirmModal" tabindex="-1" aria-labelledby="comfirmModalLable" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="comfirmModalLable">Thêm món ăn</h5>
         </div>
         <div class="modal-body">
            <h3>Bạn có muốn xóa món ăn?</h3>
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
