<table class="table table-hover">
    <thead>
        <tr>
            <th class="col-1 table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
            <th class="col-2">Họ tên</th>
            <th class="col-3">Email</th>
            <th class="col-4 text-nowrap text-xs-center">Số điện thoại</th>
            <th class="col-5 text-nowrap text-xs-center">Tình trạng</th>
        </tr>
    </thead>
    <tbody>
    @if( count($users) == 0 )
        <tr><th class="table-check"></th><td colspan="5">@include('backend.includes.nodata')</td></tr>
    @else
        <?php $i = 0; ?>
        @foreach( $users as $user )
            <?php $i++; ?>
            <tr>
                <th class="col-1 table-check"><input id="tbl-check-{{$i}}" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="{{$user->user_id}}" /><label for="tbl-check-{{$i}}"></label></th>
                <td class="col-2"><div class="title-link"><a href="{{ url('admin/user/edit/'.$user->user_id) }}">@if(!$user->user_fullname) {{$user->user_id}}@else {{ $user->user_fullname }} @endif</a></div></td>
                <td class="col-3">{{ $user->user_email }}</td>
                <td class="col-4 text-nowrap text-xs-center">{{$user->user_phone}}</td>
                <td class="col-5 text-nowrap text-xs-center">@if( $user->user_status == 0 ) <span class="label label-danger">Vô hiệu hóa</span> @else <span class="label label-success">Kích hoạt</span> @endif</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>  