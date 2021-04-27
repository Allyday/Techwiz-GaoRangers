@extends('layout_admin.base')

@section('content')



<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<h2 class="text-center display-5 mb-4 font-weight-bold">Statistics & Reports</h2>
<div class="d-flex justify-content-between flex-row" style="width:100%;float:left">
   <a href="./day" class="fw-bold btn btn-primary" style="width: 20%;float: left;">Daily</a>
   <a href="./month" class="fw-bold btn btn-secondary" style="width: 20%;float: left;">Monthly</a>
   <a href="./quarter" class="fw-bold btn btn-warning" style="width: 20%;float: left;">Quarterly</a>
   <a href="./year" class="fw-bold btn btn-success" style="width: 20%;float: left;">Yearly</a>
</div>
         <div class="row">
            <div class="col-2  m-auto">
               
               @foreach ($khachhang as $r)
<div class="report-number-container text-center">
   <div class="report-number">{{ $r->c }}</div>
   <p class="report-label">Unique Customers</p>
</div>
@endforeach
@foreach ($hoanthanh as $r)
<div class="report-number-container text-center">
   <div class="report-number">{{ $r->c }}</div>
   <p class="report-label">Completed Orders</p>
</div>
@endforeach
@foreach ($tuchoi as $r)
<div class="report-number-container text-center">
   <div class="report-number">${{ $r->c }}</div>
   <p class="report-label">Total Revenue</p>
</div>
@endforeach
@foreach ($bihuy as $r)
<div class="report-number-container text-center">
   <div class="report-number">{{ $r->c }}</div>
   <p class="report-label">Cancelled Orders</p>
</div>
@endforeach
            </div>
            <div class="col-10">
               <div class=" mt-6">
                  <script>

                     window.onload = function() {
                  
                         var chart = new CanvasJS.Chart("chartRevenue", {
                             animationEnabled: true,
                  
                             title: {
                                 text: "Total Revenue"
                             },
                             axisX: {
                                 crosshair: {
                                     enabled: true,
                                     snapToDataPoint: true
                                 }
                             },
                             axisY: {
                                 includeZero: true,
                                 crosshair: {
                                     enabled: true,
                                     snapToDataPoint: true,
                  
                                 },
                                 suffix: "$"
                             },
                             toolTip: {
                                 enabled: false
                             },
                             data: [{
                                 type: "area",
                                 xValueType: "dateTime",
                                 dataPoints: @php echo json_encode($thongke, JSON_NUMERIC_CHECK); @endphp
                             }]
                         });
                         chart.render();
                  
                     }
                  </script>

                  <div class="container w-75 my-auto mx-auto my-5" id="chartRevenue" style="height: 370px; width: 100%;"></div>
               </div>
            </div>
         </div>

         {{-- @php
            function getRevenue($option)
            {
               if ($option == 'day') {
                  $query = "SELECT DATE(timeDelivered) AS label, SUM(total_bill) AS y FROM orders GROUP BY DATE(timeDelivered)";
               } elseif ($option == 'month') {
                  $query = "SELECT CONCAT(MONTH( DATE(date_order)),' - ',YEAR( DATE(date_order))) AS label , SUM(total_bill) AS y FROM bill GROUP BY MONTH( DATE(date_order)),YEAR( DATE(date_order))";
               } elseif ($option == 'quarter') {
                  $query = "SELECT CONCAT('Quý ',QUARTER(date_order),' - ',YEAR( DATE(date_order))) AS label , SUM(total_bill) AS y FROM bill GROUP BY QUARTER( date_order),YEAR( DATE(date_order))";
               } elseif ($option == 'year') {
                  $query = "SELECT YEAR( DATE(date_order)) AS label, SUM(total_bill) AS y FROM bill GROUP BY YEAR( DATE(date_order))";
               } else return null;

               global $db;
               $stmt = $db->prepare($query);
               $stmt->execute(array());
               return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            $dataPoints = getRevenue("day");

         @endphp --}}

            
      </div>
   </main>
   <!-- page-content" -->
</div>

@endsection
