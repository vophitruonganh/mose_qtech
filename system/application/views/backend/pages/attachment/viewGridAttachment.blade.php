<div class="b-t-p">
@if( count($attachments) == 0 )
    @include('backend.includes.nodata')
@else
<ul id="attachment-grid" class="clearfix">
    @foreach( $attachments as $attachment )
    <li class="attachment-item attachment-item-{{ $attachment->attachment_id }} col-xl-2 col-lg-3 col-md-2 col-sm-3 col-xs-4">
        <div class="attachment-preview thumbnail-preview">
            <div class="thumbnail">
                <div class="centered"><img src="{{ imageRepresent($attachment->attachment_type,$attachment->attachment_url) }}" alt="{{$attachment->attachment_title}}" /></div>
            </div>
            <div class="attachment-hover-layout">
                <div class="attachment-hover-layout-in">
                    <div class="attachment-info">
                        <div class="filename">{{$attachment->attachment_title}}</div>
                        <div class="btn-group">
                            <a href="{{url('admin/attachment/edit/'.$attachment->attachment_id)}}" class="btn"><label class="sr-only">Sửa</label><i class="font-icon material-icons md-24">link</i></a>
                            <a href="javascript:;" target="_blank" class="btn attacment-delete" data-id="{{$attachment->attachment_id}}"><label class="sr-only">Xóa</label><i class="font-icon material-icons md-24">delete_forever</i></a>
                        </div>
                        <div class="attachment-date">{{ timeAgo($attachment->attachment_date) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </li>
    @endforeach
</ul>
</div>
@endif