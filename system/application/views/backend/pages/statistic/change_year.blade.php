@extends('backend.layouts.default')
@section('titlePage','Statistic')
@section('content')
<a href="{{ url('admin/report/statistic') }}">Trở Về</a>
<div id="chartContainer" style="height: 400px; width: 100%;"></div>
<script type="text/javascript">
window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            title: {
                text: "Thống Kê Năm " + <?php echo $year ?>
            },
            axisX: {
                interval: 1
            },
            data: [{
                type: "line",
                dataPoints: [
                 <?php echo $str ?>
                ]
            }]
        });
        chart.render();
    }
</script>
@stop