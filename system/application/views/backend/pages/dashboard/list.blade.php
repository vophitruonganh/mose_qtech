@extends('backend.layouts.default')
@section('titlePage','Post List')
@section('content')

<!-- form xem ngày theo tháng -->
<form action="{{ url('admin/dashboard/get-order-month') }}" method="post">
@include('backend.includes.token')
Chọn tháng năm:
<select name="month">
       
        @for ($i = 1; $i < 13; $i++)
            <option value="{{$i}}" @if( $i==$time['mon'] ){{ 'selected="selected"' }} @endif()>{{$i}}</option>
        @endfor
    
</select>
<select name="year">

    @for ($i = $time['year']-10; $i < $time['year']+10; $i++)
            <option value="{{$i}}" @if( $i==$time['year'] ){{ 'selected="selected"' }} @endif()>{{$i}}</option>
        @endfor
	}
</select>

<button type="submit" >Xem</button>
</form>
<br>


<!-- xem theo tháng trong năm -->
<form action="{{ url('admin/dashboard/get-order-year') }}" method="post">
@include('backend.includes.token')
Chọn năm:
<select name="year">

    @for ($i = $time['year']-10; $i < $time['year']+10; $i++)
            <option value="{{$i}}" @if( $i==$time['year'] ){{ 'selected="selected"' }} @endif()>{{$i}}</option>
        @endfor
	}
</select>


<button type="submit" >Xem</button>
</form>

<form action="{{ url('admin/dashboard/get-order-quarters') }}" method="post">
@include('backend.includes.token')
Chọn năm(xem quý và các tháng):
<select name="year">

    @for ($i = $time['year']-10; $i < $time['year']+10; $i++)
            <option value="{{$i}}" @if( $i==$time['year'] ){{ 'selected="selected"' }} @endif()>{{$i}}</option>
        @endfor
	}
</select>
<button type="submit" >Xem</button>
</form>

@stop
