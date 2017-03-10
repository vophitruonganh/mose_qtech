@extends('backend.layouts.default')
@section('titlePage','Post List')
@section('content')
	
	<title>CanvasJS Example</title>
	<div id="chartContainer" style="height: 400px; width: 100%;">
	</div>
	<input type="hidden" id="year" value="{{$year}}">

	<script type="text/javascript">

	 window.onload = function() {
	 	var year=$('#year').val();
	 	var list_data_month='';
        $.ajax({
        	async: false,
        	url: "admin/dashboard/data-year/"+year,
        	success: function(data) {
            list_data_month = data;
        }
        });

        var list_data_quarters='';
        $.ajax({
        	async: false,
        	url: "admin/dashboard/data-quarters/"+year,
        	success: function(data) {
            list_data_quarters = data;
        }
        });
       	console.log(list_data_quarters)
        eval('var list_data_month='+list_data_month);
        eval('var list_data_quarters='+list_data_quarters);
		
			var chart = new CanvasJS.Chart("chartContainer", {
				title: {
					text: "Doanh thu",
					fontSize: 30
				},
				animationEnabled: true,
				axisX: {
					interval: 1,
					gridColor: "Silver",
					tickColor: "silver",
					valueFormatString: ""
				},
				toolTip: {
					shared: true
				},
				theme: "theme2",
				axisY: {
					gridColor: "Silver",
					tickColor: "silver"
				},
				legend: {
					verticalAlign: "center",
					horizontalAlign: "right"
				},
				data: [
				
				{
					type: "line",
					showInLegend: true,
					name: "Doanh thu theo tháng",
					color: "#20B2AA",
					lineThickness: 2,

					dataPoints: list_data_month
				},
				{
					type: "line",
					showInLegend: true,
					name: "Doanh thu theo quý",
					color: "#33FF99	",
					lineThickness: 2,

					dataPoints: list_data_quarters
				}
				],
				legend: {
					cursor: "pointer",
					itemclick: function (e) {
						if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
							e.dataSeries.visible = false;
						}
						else {
							e.dataSeries.visible = true;
						}
						chart.render();
					}
				}
			});

			chart.render();
	}
</script>
	
@stop
