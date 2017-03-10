<table class="table table-hover">
    <thead>
        <tr>
            <th class="col-1 table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
            <th class="col-2">Tiêu đề</th>
            <?php 
                if($sort == 'created-asc'){ $sort = 'created-desc' ; }else{ $sort = 'created-asc' ; }
                $url_sort = '';
                if($search){ $url_sort .= '&search='.$search;}
                if($post_status){$url_sort .= '&post_status='.$post_status;}
                if($user_id > 0){$url_sort .= '&user_id='.$user_id;}
            ?>
            <th class="col-3 text-nowrap text-xs-center">Ngày cập nhật <a href="{{ url('admin/page?sort='.$sort.$url_sort)}}"><i class="font-icon material-icons md-18">swap_vert</i></a></th>
            <th class="col-4 text-nowrap text-xs-center">Tình trạng</th>
        </tr>
    </thead>
    <tbody>
        @if( count($posts) == 0 )<tr><th class="table-check"></th><td colspan="2">@include('backend.includes.nodata')</td></tr>@else
        <?php $i = 0; ?>
        @foreach( $posts as $post )
            <?php $i++; ?>
            <tr>
                <th class="col-1 table-check"><input id="tbl-check-{{$i}}" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="{{$post->post_id}}" /><label for="tbl-check-{{$i}}"></label></th>
                <?php if( strlen($post->post_title) == 0 ){ $title = $post->post_id; }else { $title = $post->post_title; }  ?>                
                <td class="col-2">@if($post_status=='trash' || $post->post_status == 'trash') <div class="title-text text-muted">{{ $title }}</div> @else <div class="title-link"><a href="{{ url('admin/page/edit/'.$post->post_id) }}">{{ $title }}</a></div>@endif</td>
                <td class="text-nowrap text-xs-center">{{ date('H:i d/m/Y',$post->post_modified) }}</td>
                <td class="text-nowrap text-xs-center">@if( $post->post_status == 'public' ) <span class="label label-success">Công khai</span> @elseif( $post->post_status == 'pending' ) <span class="label label-primary">Đang chờ duyệt</span> @elseif( $post->post_status == 'draft' ) <span class="label label-default">Nháp</span> @elseif( $post->post_status == 'trash' ) <span class="label label-danger">Xóa</span> @endif</td>
            </tr>
        @endforeach
        @endif
    </tbody>
</table> 