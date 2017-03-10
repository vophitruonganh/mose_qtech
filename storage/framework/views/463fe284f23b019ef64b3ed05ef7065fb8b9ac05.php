<?php $__env->startSection('titlePage','Danh sách ứng dụng'); ?>
<?php $__env->startSection('content'); ?>
<?php 
    $heading = array(
        'heading_text' => 'Danh sách ứng dụng',
        'heading_button' => '<a class="btn btn-primary waves-effect" href="'.url('admin/plugin/create').'">Thêm mới</a>',
    );
    $setion_heading = section_title($heading);
?>
	<div class="section-user mode-list">
        <div class="form-alerts"></div>
        <form action="<?php echo e(url('admin/plugin')); ?>" method="post" enctype="multipart/form-data">
			<?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered b-t-p">
                    <div class="form-inline nav-action">
                        <div class="pull-md-left">
                            <!-- <div class="form-group">
                                <select name="action_status" id="action_status" class="form-control">
                                    <option selected="selected" value="0">Chọn hành động</option>
                                    <option value="activate">Kích hoạt</option>
                                    <option value="disable">Vô hiệu hóa</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button id="na-select-btn" type="submit" class="btn btn-secondary" value="action">Áp dụng</button>
                            </div> -->
                            <?php
                                $arr=array();
                                $arr=array('activate'=> 'Kích hoạt','disable'=>'Vô hiệu hóa')
                            ?>
                            <?php echo tableActionForm($arr,'','','click: Plugin.TableAction'); ?>

                        </div>
                        <!-- <div class="pull-md-right">
                            <div class="form-group">
                                <div class="search-form">
                                    <div class="input-group">
                                        <label class="sr-only">Search</label>
                                        <input id="na-search-input" name="search" type="text" class="form-control na-search-input" value="" />
                                        <span class="input-group-btn"><button class="btn btn-search na-search-btn" type="submit"><i class="font-icon material-icons md-18">search</i></button></span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <?php echo tableSearchForm('','<div class="pull-md-right">','</div>','click: Plugin.TableSearch'); ?>

                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="customer-list data-list data-table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
                                    <th>Tên ứng dụng</th>
                                    <th>Mô tả</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if( count($listPlugin) == 0 ): ?>
                                <tr><th class="table-check"></th><td colspan="3"><?php echo $__env->make('backend.includes.nodata', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td></tr>
                            <?php else: ?>
                            <?php $i = 0; ?>
                            <?php $__currentLoopData = $listPlugin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plugin): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php $i++; ?>
                                <tr>
                                    <th class="table-check"><input id="tbl-check-<?php echo e($i); ?>" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="<?php echo e($plugin['folderPlugin']); ?>::<?php echo e($plugin['fileNamePlugin']); ?>" /><label for="tbl-check-<?php echo e($i); ?>"></label></th>
                                    <td class="tbl-nowrap column-primary">
                                    	<p class="m-a-0 tbl-title-text <?php if( $plugin['activedPlugin'] == 0 ): ?> font-weight-normal <?php else: ?> font-weight-bold <?php endif; ?>"><?php echo e($plugin['pluginName']); ?></p>
										<p class="m-a-0"><?php if( $plugin['activedPlugin'] == 0 ): ?> <a href="<?php echo e(url('admin/plugin/active/'.$plugin['folderPlugin'].'/'.$plugin['fileNamePlugin'])); ?>">Kích hoạt</a> <?php else: ?> <a href="<?php echo e(url('admin/plugin/deactive/'.$plugin['folderPlugin'].'/'.$plugin['fileNamePlugin'])); ?>">Vô hiệu hóa</a> <?php endif; ?> <?php if( $plugin['activedPlugin'] == 0 ): ?> <span class="spec">|</span> <a class="text-danger" href="<?php echo e(url('admin/plugin/delete/'.$plugin['folderPlugin'].'/'.$plugin['fileNamePlugin'])); ?>">Xóa ứng dụng</a> <a class="text-danger" href="<?php echo e(url('admin/plugin/delete/'.$plugin['folderPlugin'].'/'.$plugin['fileNamePlugin'].'/deleteAll')); ?>">Delete All ( include database )</a> <?php endif; ?></p>
                                    </td>
                                    <td>
                                        <p class="m-a-0"><?php echo e($plugin['pluginDescription']); ?></p>
                                        <p class="m-a-0"><?php if($plugin['pluginVersion']): ?> Phiên bản: <?php echo e($plugin['pluginVersion']); ?> <span class="spec">|</span> <?php endif; ?> <?php if($plugin['pluginAuthor']): ?> Nhà phát triển: <?php if($plugin['pluginAuthorUri']): ?><a target="_blank" href="<?php echo e($plugin['pluginAuthorUri']); ?>"><?php echo e($plugin['pluginAuthor']); ?></a> <?php else: ?> <?php echo e($plugin['pluginAuthor']); ?> <?php endif; ?> <span class="spec">|</span> <?php endif; ?> <?php if($plugin['pluginUri'] ): ?> <a target="_blank" href="<?php echo e($plugin['pluginUri']); ?>">Chi tiết</a> <?php endif; ?></p>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php endif; ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </form>
	</div>
<?php
/*
    {!!section_title('Danh sách ứng dụng','Thêm mới',url('admin/plugins/create'))!!}
    <div class="section-taxonomy mode-list">
        <div class="form-alerts"></div>
        <form id="plugin-form" action="{{ url('admin/plugins') }}" method="post">
            @include('backend.includes.token')
            <div class="box-typical">
                <div class="box-typical-header box-typical-header-bordered">
                    <div class="list-nav clearfix">
                        <div class="list-actions">
                            <select name="action_status" id="action_status" class="form-control">
                                <option selected="selected" value="all" data-url="{{url('admin/plugin?plugin_status=all')}}">Tất cả <span class="count">(1)</span></option>
                                <option value="edit" data-url="{{url('admin/plugin?plugin_status=public')}}">Công khai <span class="count">(2)</span></option>
                                <option value="edit" data-url="{{url('admin/plugin?plugin_status=pending')}}">Đang chờ duyệt <span class="count">(5)</span></option>
                                <option value="edit" data-url="{{url('admin/plugin?plugin_status=draft')}}">Nháp <span class="count">(3)</span></option>
                                <option value="edit" data-url="{{url('admin/plugin?plugin_status=trash')}}">Xóa <span class="count">(5})</span></option>
                            </select>
                            <select name="post_action" id="post_action" class="form-control">
                                <option selected="selected" value="0">Chọn hành động</option>
                                <option value="edit">Chỉnh sửa</option>
                                <option value="trash">Xóa</option>
                            </select>
                             <button type="submit" class="btn" name="type_submit" value="action">Áp dụng</button>
                        </div>
                        <div class="list-search">
                            <div class="search-form">
                                <div class="input-append input-group">
                                    <label for="media-search-input" class="sr-only">Search plugin</label>
                                    <input type="text" placeholder="Nhập tên ứng dụng" id="" class="form-control" />
                                    <span class="input-group-addon"><button id="attachment-search" class="btn" type="submit"><span class="glyphicon glyphicon-search"></span></button></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-typical-body">
                    <div class="post-list">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="table-check"><input type="checkbox" id="checkall" /></th>
                                    <th>Tên nhãn</th>
                                    <th>Đường dẫn</th>
                                    <th>Bài viết</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if( count($terms) == 0 )
                                <tr><th class="table-check"></th><td colspan="4">@include('backend.includes.nodata')</td></tr>
                            @else
                                @foreach( $terms as $term)
                                <tr>
                                    <th class="table-check"><input type="checkbox" class="pcb" name="check[]" id="check[]" value="{{ $term['term_id'] }}" /></th>
                                    <td class="table-title"><a href="{{ url('admin/'.$taxonomy.'/edit/'.$term['term_id']) }}">{{ $term['name'] }}</a></td>
                                    <td>{{ $term['slug'] }}</td>
                                    <td>{{ $term['count'] }}</td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </form>
    </div>
    <form action="{{ url('admin/plugin') }}" method="post">
        @include('backend.includes.token')
        <ul class="list-status clearfix">
            <li><a href="{{url('admin/plugin?plugin_status=all')}}" class="current">Tất cả <span class="count">(10)</span></a></li>
            <li><a href="{{url('admin/plugin?plugin_status=activate')}}">Kích hoạt <span class="count">(4)</span></a></li>
            <li><a href="{{url('admin/plugin?plugin_status=deactivate')}}">Không kích hoạt <span class="count">(5)</span></a></li>
            <li><a href="{{url('admin/plugin?plugin_status=update')}}">Cập nhật <span class="count">(2)</span></a></li>
        </ul>
        <div class="list-nav clearfix">
            <div class="list-actions">
                <select name="post_action" id="post_action" class="form-control" data-bind="">
                    <option selected="selected" value="publish">Chọn hành động</option>
                    <option value="trash">Kích hoạt</option>
                    <option value="trash">Bỏ kích hoạt</option>
                    <option value="trash">Cập nhật</option>
                    <option value="trash">Xóa</option>
                </select>
                 <button type="button" class="btn" data-bind1="click: PluginActionApply">Áp dụng</button>
            </div>
            <div class="list-search">
                <div class="search-form">
                    <div class="input-group">
                        <input type="text" name="s" class="form-control" placeholder="Tìm kiếm ứng dụng.." data-bind='value: PluginSearchText'>
                        <span class="input-group-btn"><button class="btn" type="submit" data-bind="click: PluginSearch"><span class="glyphicon glyphicon-search"></span></button></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-typical box-typical-padding">
            <table class="table table-hover">
            <thead>
                <tr>
                    <th class="check-column"><input type="checkbox" id="checkall" /></th>
                    <th>Tên ứng dụng</th>
                    <th>Loại</th>
                    <th>Mô tả</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $listPlugin as $key => $value )
            <tr>   
                <th class="check-column"><input type="checkbox" class="pcb" name="check[]" id="check[]" value="" /></th>
                <td>
                    <div class="">{{ $value['infoPluginName'] }}</div>
                    <div class="">
                        <span class="activate"><a href="" data-bind="">Kích hoạt</a></span>
                        <span class="delete"><a href="" data-bind="">Xóa</a></span>
                    </div>
                </td>
                <td>{{ $value['infoPluginType'] }}</td>
                <td>
                    <div class="">Adds a widget that shows the most recent posts from a single category.</div>
                    <div class="">Version: {{ $value['infoPluginVersion'] }}</div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </form>
*/
?>
    <?php /*
    <div class="row">
        @foreach( $widgets as $widget )
        Widgets: {{ $widget }}
        <div id="{{ $widget }}">
            @foreach( $totalWidget as $widgetName => $plugins )
            <?php
                if( $widget == $widgetName )
                {
            ?>
                @foreach( $plugins as $plugin )
                    <div class="{{ $plugin }}">
                        Plugin Name: {{ $listPlugin[$plugin]['infoPluginName'] }}<br />
                        Plugin Version: {{ $listPlugin[$plugin]['infoPluginVersion'] }}<br />
                    </div>
                @endforeach
            <?php
                }
            ?>
            @endforeach
        </div>
        @endforeach
    </div>
    <div class="row">
        WidgetInactive:
        @foreach( $widgetsInactive as $widgetInactive )
        {{ $widgetInactive }}
        @endforeach
    </div>
    */ ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>