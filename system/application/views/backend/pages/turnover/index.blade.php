@extends('backend.layouts.default')
@section('titlePage','Doanh thu')
@section('content')


	<script type="text/javascript">
	
	 window.onload = function() {
	 	var list_pending='';
      	$.ajax({
        	async: false,
        	url: "admin/turnover/data-month/8/2016/1",
        	
        	success: function(data) {
            list_pending = data;
        	}
        });
       
        var list_success='';
        $.ajax({
        	async: false,
        	url: "admin/turnover/data-month/8/2016/0",
        	
        	success: function(data) {
            list_success = data;
        }
        });
    
       
        eval('var list_pending='+list_pending);
        eval('var list_success='+list_success);
		
			var chart = new CanvasJS.Chart("chartContainer", {
				title: {
					text: "Doanh thu theo tháng",
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
	<?php 
		$now   = getdate();
		$month = $now['mon'];
		$year  = $now['year'];
	 ?>
	Tháng:  {{$month}}
	<div id="chartContainer" style="height: 400px; width: 100%;">
	</div>
	
	<form action="{{url('admin/turnover/month')}}" method="Post">
	@include('backend.includes.token')
		
		<select name="month" id="month">
			@for ($i=1 ; $i <13; $i++)
				<option value="{{$i}}" @if($i==$time['mon']) selected='selected' @endif>{{$i}}</option>
			@endfor
		</select>
		Năm
		<select name="year" id="year">
			@for($i=$time['year']-10; $i<$time['year']+10; $i++)
				<option value="{{$i}}" @if($i==$time['year'] ) selected='selected' @endif >{{$i}}</option>
			@endfor
		</select>
		<input type="submit" value="xem">
	</form>

	<form action="{{url('admin/turnover/year')}}" method="Post">
	@include('backend.includes.token')
		
		Năm
		<select name="year" id="year">
			@for($i=$time['year']-10; $i<$time['year']+10; $i++)
				<option value="{{$i}}" @if($i==$time['year'] ) selected='selected' @endif >{{$i}}</option>
			@endfor
		</select>
		<input type="submit" value="xem">
	</form>

	<form action="{{url('admin/turnover/quarters')}}" method="Post">
	@include('backend.includes.token')
		
		Xem theo quý của năm
		<select name="year" id="year">
			@for($i=$time['year']-10; $i<$time['year']+10; $i++)
				<option value="{{$i}}" @if($i==$time['year'] ) selected='selected' @endif >{{$i}}</option>
			@endfor
		</select>
		<input type="submit" value="xem">
	</form>
@stop
