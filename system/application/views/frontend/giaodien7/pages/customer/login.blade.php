@extends('frontend.giaodien7.layouts.default')
@section('content')

@if( count($errors) > 0 )
<ul>
    @foreach( $errors->all() as $error )
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<script type="text/javascript">
               window.location="/";
      </script>

@stop