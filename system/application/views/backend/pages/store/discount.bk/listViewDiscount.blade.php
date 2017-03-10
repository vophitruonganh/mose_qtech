<table id="discount-list" class="table table-hover">
    <thead>
        <tr>
            <th class="table-check"><input type="checkbox" id="check-all" class="filled-tbl" /><label for="check-all"></label></th>
            <th>Khuyến mãi</th>
            <th class="text-xs-center">Số lần sử dụng</th>
            <th>Thời gian</th>
        </tr>
    </thead>
    <tbody>
    @if( count($terms) == 0 )
        <tr><th class="table-check"></th><td colspan="4">@include('backend.includes.nodata')</td></tr>
    @else
    <?php $i = 0; ?>
    @foreach( $terms as $term)
    <?php $i++; $value=decode_serialize($term->meta_value); ?>
    <tr>
        <th class="table-check"><input id="tbl-check-{{$i}}" type="checkbox" class="filled-tbl" name="check[]" id="check[]" value="{{$term->term_id}}" /><label for="tbl-check-{{$i}}"></label></th>
        <td class="table-title"><a href=""></a></td>
        <td class="text-xs-center">{{$term->count}}</td>
        <td>Bắt đầu: {{ date('H:i d-m-Y',$value["date_start"]) }} <br />Kết thúc: @if($value["date_limit"]=="false") {{ date('H:i d-m-Y',$value["date_end"]) }} @else -- @endif</td>
    @endforeach
    </tbody>
    @endif
</table>
	@if( count($terms) == 0 )
        @include('backend.includes.nodata')
        @else
        <table class="border">
            <tr>
                <td>Chi tiết</td>
                <td>Số lần sử dụng</td>
                <td>Thời gian bắt đầu / kết thúc</td>
                <td></td>
            </tr>
            @foreach( $terms as $term)
            <tr>   
                <?php 
                    $value=decode_serialize($term->meta_value);
                    $time=time();
                ?>
                <td @if($value["discount_active"]==0) style=text-decoration:line-through @endif>
                    <?php
                        $data="";
                        if($value["discount_promotion"]==1){
                            if($value["date_end"]<$time && $value["date_limit"]=="false"){
                               $data.="<b>Đã hết hạn</b><br>"; 
                            }
                            $data.="MÃ KHUYẾN MÃI: <b>".$term->name."</b><br>";
                            if($value["discount_type"]==1){
                                $data.="Giảm ".$value["discount_take"]." đ cho ";
                            }
                            else{
                                $data.="Giảm ".$value["discount_take"]." % cho ";
                            }
                            if($value["discount_offer"]==1){
                                $data.="tất cả đơn hàng<br>";
                            }
                            if($value["discount_offer"]==2){
                                $data.="đơn hàng có giá trị từ ".number_format($value["dv_money"],0,',',',')."đ<br>";
                            }
                            if($value["discount_offer"]==3){
                                $data.="nhóm sản phẩm ";
                                $group_name;
                                foreach($group_products as $group_product){
                                    if($value["dv_value"]==$group_product->term_id){
                                        $group_name=$group_product->name;
                                        break;
                                    }
                                }
                                $data.="<u>".$group_name."</u> ";
                                if($value["dv_count"]==0){
                                    $data.="(từng sản phẩm trong đơn hàng)<br>";
                                }
                                else{
                                    $data.="(trên cả đơn hàng)<br>";   
                                }
                            }
                            if($value["discount_offer"]==4){
                                $data.="sản phẩm ";
                                $product_name = '';
                                foreach($products as $product){
                                    if($value["dv_value"]==$product->post_id){
                                        $product_name=$product->post_title;
                                        break;
                                    }
                                }
                                $data.="<u>".$product_name."</u> ";
                                if($value["dv_count"]==0){
                                    $data.="(từng sản phẩm trong đơn hàng)<br>";
                                }
                                else{
                                    $data.="(trên cả đơn hàng)<br>";   
                                }
                            }
                            if($value["discount_join"]=="true"){
                                $data.="<font color='red'><i>"."((Mã khuyến mãi có thể sử dụng chung với chương trình khuyến mãi)"."</i></font>";
                            }
                            else{
                                $data.="<font color='red'><i>"."((Mã khuyến mãi không thể sử dụng chung với chương trình khuyến mãi)"."</i></font>";
                            }
                            echo $data;
                        }
                        else{
                            $data.="CHƯƠNG TRÌNH KHUYẾN MÃI: <b>".$term->name."</b><br>";
                            if($value["discount_type"]==1){
                                $data.="Giảm ".$value["discount_take"]." đ cho ";
                            }
                            else{
                                $data.="Giảm ".$value["discount_take"]." % cho ";
                            }
                            if($value["discount_offer"]==3){
                                $data.="nhóm sản phẩm ";
                                $group_name;
                                foreach($group_products as $group_product){
                                    if($value["dv_value"]==$group_product->term_id){
                                        $group_name=$group_product->name;
                                    }
                                }
                                $data.="<u>".$group_name."</u> ";
                                $data.="(khi mua ".$value["dv_count"]." sản phẩm trở lên)";
                            }
                            if($value["discount_offer"]==4){
                                $data.="sản phẩm ";
                                $product_name = '';
                                foreach($products as $product){
                                    if($value["dv_value"]==$product->post_id){
                                        $product_name=$product->post_title;
                                    }
                                }
                                $data.="<u>".$product_name."</u> ";
                                $data.="(khi mua ".$value["dv_count"]." sản phẩm trở lên)";
                            }
                            echo $data;
                        }
                    ?>
                </td>
                <td>
                <a href="{{ url('admin/discount/edit/'.$term->term_id) }}" title="Edit">
                @if($value["discount_active"]==1)
                    Ngưng
                @else
                    Sử dụng
                @endif
                </a> - <a href="{{ url('admin/discount/delete/'.$term->term_id) }}" title="Delete">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $terms->render() !!}
        @endif
