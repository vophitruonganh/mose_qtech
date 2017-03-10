@extends('backend.layouts.default')
@section('titlePage','Chi tiết đơn hàng')
@section('content')
    @include('backend.includes.showErrorValidator')
    <form id="form" name="form" action="" method="post" enctype="multipart/form-data">
        @include('backend.includes.token')
        <input id="order_code" name="order_code" type="hidden" value="{{ $order->order_code }}"/>
        <div class="row">
        
            <table class="border">
                <thead>
                    <tr>
                        <td>Product</td>
                        <td>Order Product</td>
                        <td>Price</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                <?php $total=0 ?>
                @foreach ($orders as $row)
                    <tr>
                        <?php 
                            $value=decode_serialize($row->meta_value);
                            $a=decode_serialize($row->om_value);
                            foreach ($a as $key => $v) {
                                $quantity=$v['quantity'];
                            }
                        ?>
                        <td>
                            {{$row->post_title}}
                        </td>
                        <td>
                            {{$quantity}}
                        </td>
                        <td>
                            {{number_format($value["price_new"],0,',',',')}} đ
                        </td>       
                        <td>
                            {{number_format($quantity*$value["price_new"],0,',',',')}} đ
                        </td>
                        <?php $total+=$quantity*$value["price_new"]; ?>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
		<div class="row">  
            Order Content: <span><?php 
            $order_content = $order->order_content; 
            $order_content = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $order_content);
            echo $order_content;
            ?></span>
        </div>
        <div class="row">      
            Total: <span>{{number_format($total,0,',',',')}} đ</span>
            <a href="{{ url('admin/order/print/'.$order->order_code) }}" onclick="window.open(this.href,'targetWindow', 'toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=SomeSize, height=SomeSize'); return false;">in</a>
        </div> 
    </form>
    
    @stop