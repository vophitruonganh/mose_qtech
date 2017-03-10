@extends('backend.layouts.default')
@section('titlePage','Post List')
@section('content')
<script type="text/javascript" src="http://localhost/qmweb/public/admin/assets/plugins/canvasjs/canvasjs.min.js"></script>

	<script type="text/javascript">

	function chart_line(){
		var month_value=$('#month').val();
		var list_data_day='';
      	$.ajax({
        	async: false,
        	url: "admin/dashboard/data-day/2016/"+month_value,
        	
        	success: function(data) {
            list_data_day = data;
        	}
        });
       
        var list_data_month='';
        $.ajax({
        	async: false,
        	url: "admin/dashboard/data-month/2016",
        	
        	success: function(data) {
            list_data_month = data;
        }
        });
       
        eval('var list_data_day='+list_data_day);
        eval('var list_data_month='+list_data_month);
		
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
					lineThickness: 2,
					name: "Doanh thu theo ngày",
					markerType: "square",
					color: "#F08080",
					dataPoints: list_data_day
				},
				{
					type: "line",
					showInLegend: true,
					name: "Doanh thu theo tháng",
					color: "#20B2AA",
					lineThickness: 2,

					dataPoints: list_data_month
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
	
	 window.onload = function() {
	 		var list_data_day='';
      	$.ajax({
        	async: false,
        	url: "admin/dashboard/data-day/2016/1",
        	
        	success: function(data) {
            list_data_day = data;
        	}
        });
       
        var list_data_month='';
        $.ajax({
        	async: false,
        	url: "admin/dashboard/data-month/2016",
        	
        	success: function(data) {
            list_data_month = data;
        }
        });
       
        eval('var list_data_day='+list_data_day);
        eval('var list_data_month='+list_data_month);
		
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
					lineThickness: 2,
					name: "Doanh thu theo ngày",
					markerType: "square",
					color: "#F08080",
					dataPoints: list_data_day
				},
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

					dataPoints: [
						{x:2  ,y:23 },
						{x:4  ,y:12 },
						{x:6  ,y:11 },
						{x:8  ,y:80 },
						{x:10 ,y:12 },
						{x:12 ,y:25 },
						{x:14 ,y:37 },
						{x:16 ,y:56 },
						{x:18 ,y:56 },
						{x:20 ,y:90 }
					]
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
	
	<title>CanvasJS Example</title>
	<div id="chartContainer" style="height: 400px; width: 100%;">
	</div>
	<select name="month" id="month" >
		@for($i=1;$i<13;$i++)
			<option value="{{$i}}" >{{$i}}</option>
		@endfor()
	</select>
	<input type="button" value="Bấm" onclick="chart_line()">
	<script type="text/javascript">
		
		
	</script>
@stop
