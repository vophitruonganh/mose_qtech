@extends('backend.layouts.default')
@section('titlePage','Post List')
@section('content')
	
	
	<div id="chartContainer" style="height: 400px; width: 100%;"></div>
	<title>Year</title>
	<input type="hidden" id="year" value="{{$year}}" >
	<script type="text/javascript">

	var year=$('#year').val();
	var list = '';
      $.ajax({
        async: false,
        url: "admin/dashboard/data-year/"+year,
        success: function(data) {
            list = data;
        }
        });
    /*end*/
    
    //$('.page-content').html(list);
   window.onload = function() {
   	
   	eval('var list='+list);
		var chart = new CanvasJS.Chart("chartContainer", {
			title: {
				text: "Đơn hàng các tháng trong năm: " + year
			},
			axisX: {
				interval: 1
			},
			data: [{
				type: "line",
				dataPoints: list

				
			}]
		});
		chart.render();
	}
	</script>
@stop