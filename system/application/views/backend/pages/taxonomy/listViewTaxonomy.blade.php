<table class="table table-hover">
    <thead>
        <tr>
            <th class="col-1 table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
            @if(isset($data_arr['list_view']['title']))<th class="col-2">{{ $data_arr['list_view']['title'] }}</th>@endif
            @if(isset($data_arr['list_view']['slug']))<th class="col-3">{{ $data_arr['list_view']['slug'] }}</th>@endif
            @if(isset($data_arr['list_view']['count']))
                <th class="col-4">{{ $data_arr['list_view']['count'] }}</th>
            @endif
            @if(isset($data_arr['list_view']['excerpt']))<th class="col-5">{{ $data_arr['list_view']['excerpt'] }}</th>@endif
        </tr>
    </thead>
    <tbody>
    @if( count($taxonomy) == 0 )
        <tr><th class="table-check"></th><td colspan="5">@include('backend.includes.nodata')</td></tr>
    @else
        <?php $i = 0; ?>
        @foreach( $taxonomy as $tax)
        <?php $i++; ?>
        <tr>
            <th class="col-1 table-check"><input id="tbl-check-{{$i}}" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="{{ $tax['taxonomy_id'] }}" /><label for="tbl-check-{{$i}}"></label></th>
            @if(isset($data_arr['list_view']['title']))<td class="col-2"><div class="title-link"><a href="{{ url('admin/taxonomy/'.$data_arr['tax_slug'].'/edit/'.$tax['taxonomy_id']) }}">{{ $tax['taxonomy_name'] }}</a></div></td>@endif
            @if(isset($data_arr['list_view']['slug']))<td class="col-3">{{ $tax['taxonomy_slug'] }}</td>@endif
            @if(isset($data_arr['list_view']['count']))<td class="col-4">{{ $tax['taxonomy_count'] }}</td>@endif
            @if(isset($data_arr['list_view']['excerpt']))<td class="col-5">{{ $tax['taxonomy_excerpt'] }}</td>@endif
        </tr>
        @endforeach
    @endif
    </tbody>
</table>  