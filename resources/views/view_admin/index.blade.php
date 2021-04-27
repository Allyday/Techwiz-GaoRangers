@extends('layout_admin.base')

@section('content')



<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
         <h2 class="text-center display-5 mb-4 font-weight-bold">THỐNG KÊ BÁN HÀNG</h2>
         @foreach ($hoanthanh as $r)
            <p>Hoàn thành: {{ $r->c }}</p>
         @endforeach
         @foreach ($tuchoi as $r)
         <p>Từ chối: {{ $r->c }}</p>
      @endforeach
      @foreach ($bihuy as $r)
      <p>bị hủy: {{ $r->c }}</p>
   @endforeach
   @foreach ($khachhang as $r)
      <p>số khách hàng đã order: {{ $r->c }}</p>
   @endforeach
         <div class="row">
            <div class="col-2  m-auto">
               <div class="d-flex justify-content-between flex-column">
                  <a href="./day" class="fw-bold btn btn-primary">Theo ngày</a>
                  <a href="./month" class="fw-bold btn btn-secondary">Theo tháng</a>
                  <a href="./quarter" class="fw-bold btn btn-warning">Theo quý</a>
                  <a href="./year" class="fw-bold btn btn-success">Theo năm</a>
               </div>
            </div>
            <div class="col-10">
               <div class=" mt-6">
                  <script>

                     window.onload = function() {
                  
                         var chart = new CanvasJS.Chart("chartRevenue", {
                             animationEnabled: true,
                  
                             title: {
                                 text: "Doanh thu bán hàng"
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
                                 suffix: "VNĐ"
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
