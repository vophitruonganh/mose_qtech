@if( count($attachments) == 0 )
    @include('backend.includes.nodata')
@else
<ul id="attachment-grid" class="clearfix">
    @foreach( $attachments as $attachment )
    <li class="attachment-item attachment-item-{{ $attachment->attachment_id }} col-xl-2 col-sm-3 col-xs-4">
        <div class="thumbnail-preview">
            <div class="thumbnail">
                <div class="centered"><img src="{{ imageRepresent($attachment->attachment_type,$attachment->attachment_url) }}" alt="{{$attachment->attachment_title}}" /></div>
                <input type="hidden" name="hidden_attactment_id" class="hidden_attactment_id" value="{{$attachment->attachment_id}}" />
            </div>
        </div>
    </li>
    @endforeach
</ul>
@endif