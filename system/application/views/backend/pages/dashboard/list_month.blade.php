@extends('backend.layouts.default')
@section('titlePage','Post List')
@section('content')
    <div id="chartContainer" style="height: 400px; width: 100%;"></div>
    <input type="hidden" id="year" value="{{$year}}" >
    <input type="hidden" id="month" value="{{$month}}" >
    
    <script type="text/javascript">
    /* bỏ dữ liệu từ controller qu*/
      var year=$('#year').val();
      var month=$('#month').val();
      var list_product='';
      $.ajax({
        async: false,
        url: "admin/dashboard/data-month/"+year+"/"+month,
        data:{"_token":"mwxsu4XBios4YROInQca0LYbohHVXRKD8svPv8Ci"},
        success: function(data) {
            list_product = data;
        }
        });
    /*end*/
 
      window.onload = function () {
        eval('var list_product='+list_product);
        var chart = new CanvasJS.Chart("chartContainer",
        {
          title:{
            text: "Số đơn hàng trong tháng: "+month+"/"+year
          },
          axisX: {
            interval: 1
          },
          data: [
            {
              type: "line",
              dataPoints: 
              list_product
            }
          ]
        });
        chart.render();
    }
    </script>
  

@stop
