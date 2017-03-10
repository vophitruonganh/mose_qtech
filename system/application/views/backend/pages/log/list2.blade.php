@extends('backend.layouts.default')
@section('titlePage','Log List')
@section('content')
	@if( count($logs) == 0 )
        Bạn chưa làm gì cả
    @else
        <?php
        $xhtml = '';
        ?>
        @forelse($logs as $log)
            <?php 
                $type = substr($log->log_type,4);
                $type = str_replace('_',' ',$type);
                $type = ucwords($type);
                if($log->log_action == 'new'){
                    $action = 'thêm';
                }else if($log->log_action == 'update'){
                    $action = 'cập nhật';
                }else if($log->log_action == 'delete') {
                    $action = 'xoá';
                }else{
                    $action = 'đăng nhập';
                    $type = '';
                }
                $time = date('d-m-Y H:i:s',$log->log_date);
                $xhtml .= "<p>Bạn đã $action $type thành công vào lúc $time</p>";
            ?>
        @empty
            <p>Bạn chưa làm gì cả</p>
        @endforelse
        {!! $xhtml !!}
    @endif
@stop