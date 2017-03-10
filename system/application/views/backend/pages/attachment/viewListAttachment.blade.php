<table class="table table-hover">
    <thead>
        <tr>
            <th class="col-1 table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
            <th class="col-2">Tập tin</th>
            <th class="col-3 text-nowrap text-xs-center">Người đăng</th>
            <th class="col-4">Ngày tải lên</th>
        </tr>
    </thead>
    <tbody>
    @if( count($attachments) == 0 )
        <tr><th class="table-check"></th><td colspan="3">@include('backend.includes.nodata')</td></tr>
    @else
    <?php $i = 0; ?>
    @foreach( $attachments as $attachment)
    <?php $i++; ?>
    <tr>
        <th class="col-1 table-check"><input id="tbl-check-{{$i}}" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="{{$attachment->attachment_id}}" /><label for="tbl-check-{{$i}}"></label></th>
        <td class="col-2">
            <div class="table-image"><div class="thumbnail"><div class="centered"><img src="{{ imageRepresent($attachment->attachment_type,$attachment->attachment_url) }}" alt="{{$attachment->attachment_title}}" /></div></div></div>
            <div class="table-title"><a href="{{url('admin/attachment/edit/'.$attachment->attachment_id)}}">{{$attachment->attachment_title}}</a></div>
        </td>
        <td class="col-3 text-nowrap text-xs-center">{{$attachment->user_fullname}}</td>
        <td class="col-4">{{ date('H:i d/m/Y',$attachment->attachment_date)}}</td>
    </tr>
    @endforeach
    </tbody>
    @endif
</table>