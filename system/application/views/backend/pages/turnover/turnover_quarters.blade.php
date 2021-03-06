@extends('backend.layouts.default')
@section('titlePage','Doanh thu')
@section('content')


	<script type="text/javascript">
	
	 window.onload = function() {
	 	var month = '1';
	 	var year  = '2016';
	 	year      = $('#year').val();
	 	var list_pending='';
      	$.ajax({
        	async: false,
        	url: "admin/turnover/data-quarters/"+year+"/1",
        	
        	success: function(data) {
            list_pending = data;
        	}
        });
        console.log(list_pending);
       
        var list_success='';
        $.ajax({
        	async: false,
        	url: "admin/turnover/data-quarters/"+year+"/0",
        	
        	success: function(data) {
            list_success = data;
        }
        });
    
       
        eval('var list_pending='+list_pending);
        eval('var list_success='+list_success);
		
			var chart = new CanvasJS.Chart("chartContainer", {
				title: {
					text: "Doanh thu theo quý",
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
					name: "Doanh thu chưa xử lý",
					color: "#20B2AA",
					lineThickness: 2,

					dataPoints: list_pending
				},
				{
					type: "line",
					showInLegend: true,
					name: "Doanh thu đã xử lý",
					color: "#33FF99	",
					lineThickness: 2,

					dataPoints: list_success
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
	Năm: {{$year}}
	<div id="chartContainer" style="height: 400px; width: 100%;">
	</div>
	<input type="hidden" id="year" name="year" value="{{$year}}">
	
@stop
