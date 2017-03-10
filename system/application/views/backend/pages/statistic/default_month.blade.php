@extends('backend.layouts.default')
@section('titlePage','Statistic')
@section('content')

@if(!empty($monthStatistic) && !empty($yearStatistic))
<h3>Lựa chọn Tháng Năm</h3>
@endif

@if(!empty($monthStatistic))
<form action="{{ url('admin/report/statistic/month') }}" method="POST">
    @include('backend.includes.token')
    <div class="row">
        <label for="month">Tháng</label>
        <select name="month">
            @foreach($monthStatistic as $value)
                @if($value->statistic_key == $date)
                    <option value="{{ $value->statistic_key }}" selected>{{ $value->statistic_key }}</option>
                @else
                    <option value="{{ $value->statistic_key }}">{{ $value->statistic_key }}</option>
                @endif
            @endforeach
        </select>
        <input type="submit" value="Xem" name="monthSubmit" />
    </div>
</form>
@endif

@if(!empty($yearStatistic))
<form action="{{ url('admin/report/statistic/year') }}" method="POST">
    @include('backend.includes.token')
    <div class="row">
        <label for="year">Năm</label>
        <select name="year">
            @foreach($yearStatistic as $value)
                @if($value->year == $year)
                    <option value="{{ $value->year }}" selected>{{ $value->year }}</option>
                @else
                    <option value="{{ $value->year }}">{{ $value->year }}</option>
                @endif
            @endforeach
        </select>
        <input type="submit" value="Xem" name="yearSubmit" />
    </div>
</form>
@endif

<div id="chartContainer" style="height: 400px; width: 100%;"></div>
<script type="text/javascript">
window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            title: {
                text: "Thống Kê Tháng " + <?php echo $month ?> + '-' + <?php  echo $year?>
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