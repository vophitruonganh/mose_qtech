<!-- CATEGORY-SIDEBAR-START -->
<div class="menu_index_left side_collection">

        <!-- Widget 7 -->
        <?php $list_tax = get_taxonomy_product('product_category') ?>
        @if($list_tax)
        <h2 class="menu_title icon_title_1">
            Danh Mục Sản Phẩm
            <div class="show_nav_bar1 hidden-lg hidden-md"><i class="fa fa-bars"></i></div>
        </h2>
        <ul class="menu_index_lv1 show1">
            @foreach($list_tax as $tax)
                <li class="li_lv1  icon1"><a href="{{url('collections/'.$tax->taxonomy_slug)}}">{{$tax->taxonomy_name}}</a></li>
            @endforeach
        </ul>
        @endif
        <!-- End Widget 7 -->
</div>
<!-- CATEGORY-SIDEBAR-END -->
<!-- CATEGORY-SIDEBAR-START -->
<div class="menu_index_left menu_index2_left side_collection">
        <!-- Widget 8 -->
        <div class="menu_index_left menu_index2_left">
        <?php $list_tax = get_taxonomy_product('product_group') ?>
        @if($list_tax)
        <h2 class="menu_title icon_title_2">
            Nhóm sản phẩm
            <div class="show_nav_bar2 hidden-lg hidden-md"><i class="fa fa-bars"></i></div>
        </h2>
        <ul class="menu_index_lv1 show2">
            @foreach($list_tax as $tax)
                <li class="li_lv1  icon1"><a href="{{url('collections/'.$tax->taxonomy_slug)}}">{{$tax->taxonomy_name}}</a></li>
            @endforeach
        </ul>
        <!--
        <div class="banner_tab_left hidden-xs hidden-sm">
            <a href="https://">
            <img alt="Office 365" src="images/layer-21.jpg?1459504100932" />
            </a>
        </div>
        -->
        @endif
        </div>
        <!-- End Widget 8 -->
</div>
<!-- CATEGORY-SIDEBAR-END -->