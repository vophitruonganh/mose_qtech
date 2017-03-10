@extends('backend.layouts.default')
@section('titlePage','Log List')
@section('content')
	@if( count($logs) == 0 )
        @include('backend.includes.nodata')
        @else
        <table class="border" width="700">
            <tr>
                
                <td>ID</td>
                <td>User ID</td>
                <td>Post ID</td>
                <td>Attachment ID</td>
                <td>Ordercode</td>
                <td>Date Time</td>
                <td>Type</td>
                <td>Action</td>
                <td>Status</td>
            </tr>
            @foreach( $logs as $log )
            <tr>   
                <td>{{ $log->log_id }}</td>
                <td>{{ $log->user_id }}</td>
                <td>{{ $log->post_id }}</td>
                <td>{{ $log->attachment_id }}</td>
                <td>{{ $log->order_code }}</td>
                <td>{{ $time = date('d-m-Y H:i:s',$log->log_date) }}</td>
                <td>{{ $log->log_type }}</td>
                <td>{{ $log->log_action }}</td>
                <td>{{ $log->log_status }}</td>
            </tr>
            @endforeach
        </table>
        {!! $logs->render() !!}
        @endif
@stop