@extends('layout_admin.base')

@section('content')

<h2 class="text-center display-5 mb-4">All Orders</h2>
<div class=" mt-6">
   <div id="table_filter" class="dataTables_filter">
      <form action="/staff/searchOrder" method="post" style="width:37%;float:left">
         @csrf
         @method('POST')        
      <label>Search:<input type="number" name="search" class="" placeholder="" aria-controls="table"></label>
      
      <button type="submit" class="btn btn-success fw-bold" id="btn-update"><i class="fas fa-search"></i>

      </button>
      </form>
      <form action="/staff/status/searchOrder" method="post" style="width:27%;float:left">
         @csrf
         @method('POST')        
         <input type="hidden" name="search" value="2">
         <button type="submit" class="btn btn-warning fw-bold" id="btn-update">Pending
         </button>
      
      </form>
      <form action="/staff/status/searchOrder" method="post" style="width:16%;float:left">
         @csrf
         @method('POST') 
         <input type="hidden" name="search" value="3">
         <button type="submit" class="btn btn-secondary fw-bold" id="btn-update">Cooking
         </button>
      
      </form>
      <form action="/staff/status/searchOrder" method="post" style="width:16%;float:left">
         @csrf
         @method('POST') 
         <input type="hidden" name="search" value="4">
         <button type="submit" class="btn btn-primary fw-bold" id="btn-update">Ready!!!
         </button>
 
      </form>
   </div>
   <table id="tableCustomer" class="table hover row-border" style="width:100%">
      <thead>
         <tr>
            <th>Id Dish</th>
            <th>Orderer</th>
            <th>Status</th>
            <th>Time Create</th>
            <th></th>
         </tr>
      </thead>
      <tbody>
         
        @foreach ($dsorders as $row)
            @php
               $status = $row->orderStatus;
               $status++;
            @endphp
            <script>
               function status(status) {
                  if (status == 10) {
                     return $('#orderStatus').val(6);
                  }
               }
               
            </script>
            <tr>
               <td>{{ $row->id }}</td>
               <td>{{ $row->firstName }} {{ $row->lastName }}</td>
               <td>@php
                echo getStatusOrderTag($row->orderStatus);               
                @endphp</td>
               <td>{{ $row->timeCreated }}</td>
               <td class="text-center">
                  <form action="/staff/orderStatus/{{$row->id}}" method="post">
                     @csrf
                     @method('POST')   
                     <input type="hidden" id="orderStatus" name="orderStatus" value="{{ $status }}">
                     <a href="/staff/{{ $row->id }}/orderDetail" class="btn btn-primary"><i class="fas fa-search-dollar"></i></a>
                     <button type="submit" class="btn btn-success fw-bold" onclick="setTimeout(status({{ $status }}), 5000)" id="btn-update"><i class="fa fa-angle-double-right"></i></button>
                  </form>
                  {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                     <i class="fas fa-search-dollar"></i>                   </button> --}}
               </td>
               {{-- <td>
               <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Order details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        {{$row->id}}
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
               </td> --}}
            </tr>
            
        @endforeach
        @php
           function getStatusOrderTag($id_status)
            {
               switch ($id_status) {
                  case 2:
                        return '<span class="btn-warning p-1 ">Pending</span>';
                        break;
                  case 3:
                        return '<span class="btn-secondary p-1 ">Cooking</span>';
                        break;
                  default:
                        return '<span class="btn-primary p-1 ">Ready!!!</span>';
                        break;
               }
            }
            // function model($ds)
            // {
            //    foreach ($ds as $k) {
            //       echo '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            //          <div class="modal-dialog" role="document">
            //          <div class="modal-content">
            //             <div class="modal-header">
            //                <h5 class="modal-title" id="exampleModalLabel">Order details</h5>
            //                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            //                <span aria-hidden="true">&times;</span>
            //                </button>
            //             </div>
            //             <div class="modal-body">
            //                '.$k->id.'
            //             </div>
            //             <div class="modal-footer">
            //                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            //             </div>
            //          </div>
            //          </div>
            //       </div>';
            //    } 
            // }
        @endphp
      </tbody> 
      <tfoot>
        <tr>
            <th>Id Dish</th>
            <th>Orderer</th>
            <th>Status</th>
            <th>Time Create</th>
            <th></th>
         </tr>
      </tfoot>
   </table>
</div>


{{-- @php
   echo model($dsorders);               
@endphp --}}


<script>
   // $(document).ready(function() {
   //      $('.table').DataTable({
   //          responsive: true,
   //          className: 'dt-body-center',
   //          "pageLength": 50
   //      });
   //  });
</script>
@endsection
