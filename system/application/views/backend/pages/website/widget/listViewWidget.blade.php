<table class="table table-hover">
    <thead>
        <tr>
            <th class="col-md-6">Tên ứng dụng</th>
            <th class="col-md-4 text-nowrap text-xs-center">Tình trạng</th>
            <th class="col-md-2 text-nowrap text-xs-center">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @if( count($pluginInWidget) == 0 )
            <tr><td colspan="3">@include('backend.includes.nodata')</td></tr>
        @else
            <?php $i = 0; ?>
            @foreach( $pluginInWidget as $key => $row )
            <?php $i++; ?>
            <tr data-id="{{ $i }}" data-path="{{ $row['folderPlugin'] }}">
                <th class="table-title column-primary @if( $row['enableEditButton'] == 1) tbl-title-text @endif">{{ $row['pluginName'] }}</th>
                <td class="text-nowrap text-xs-center">@if( $row['enableEditButton'] == 1) <span class="label label-success">Đang hoạt động</span> @else <span class="label label-default">Không hoạt động</span> @endif</td>
                <td class="text-nowrap text-xs-center">
                    <div class="table-btn btn-group btn-group-sm">
                        <input type="hidden" name="plugin[{{ $widget }}][{{ $i }}]" value="{{ $row['folderPlugin'] }}">
                        <button type="button" class="btn plugin-widget-edit" @if( $row['enableEditButton'] !== 1)disabled="disabled"@endif><i class="material-icons md-18">mode_edit</i></button>
                        <button type="button" class="btn plugin-widget-remove"><i class="material-icons md-18">delete</i></button>
                    </div>
                </td>
            </tr>
        @endforeach
        @endif
    </tbody>
</table> 