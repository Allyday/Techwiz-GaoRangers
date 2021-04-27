@extends('layout_admin.base')

@section('content')

<h2 class="text-center display-5 mb-4">ORDER DETAIL</h2>
@foreach ($ttorder as $row)
    <p>Order: {{ $row->firstName }} {{ $row->lastName }}</p>
    <p>Time Create: {{ $row->timeCreated }}</p>
@endforeach
<div class=" mt-6">
    <table id="tableCustomer" class="table hover row-border" style="width:100%">
       <thead>
          <tr>
             <th>Dish Name</th>
             <th>Dish Quantity</th>
             <th>Total</th>
          </tr>
       </thead>
       <tbody>
            @foreach ($dsdish as $row)
                {{-- @php
                    $price = $row->price;
                    $dishQuantity = $row->dishQuantity;
                    $Sprice = $price*$row->dishQuantity
                @endphp --}}
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->dishQuantity }}</td>
                    <td></td>
                </tr>
            @endforeach
            <tr>
                <td>Total money:</td>
                <td></td>
                @foreach ($ttorder as $row)
                <td>$ {{ $row->totalDishPrice }}</td>
                @endforeach
            </tr>
       </tbody>
    </table>
</div>


@endsection
