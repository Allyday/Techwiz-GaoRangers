@extends('layout_admin.base')

@section('content')

<h2 class="text-center display-5 mb-4">Menu</h2>
<div class="row">
   <div class="w-100 text-end">

      <a href="dish/create" class="btn btn-primary btn-rounded ml-auto">Add</a>

   </div>
</div>
<div class=" mt-6">
   <table id="tableCustomer" class="table table-dark hover row-border" style="width:100%">
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
            <td>{{ $row->restaurantName }}</td>
            <td>{{ $row->categoryName }}</td>
            <td><img src="{{ $row->photo }}" alt="{{ $row->name }}" style="max-width:100px"></td>
            <td class="text-center">
               <a href="{{$row->id}}/edit" class="btn-edit  btn-control text-success">
                  <i class="far fa-edit"></i>
               </a>
               <a title="Xoa" class="btn-delete  btn-control text-danger" data-toggle="modal" data-target="#exampleModal{{ $row->id }}">
                  <i class="far fa-times-circle"></i>
               </a>
            </td>
         </tr>

         <div class="modal fade" id="exampleModal{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     Delete {{ $row->name }}? This action cannot be reversed
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     <form action="{{ route('delete-dish', $row->id) }}" method="post">
                        @csrf
                        @method('POST')
                        <input type="hidden" value="0" name="is_active">
                        <button type="submit" class="btn btn-primary">Delete</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>

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