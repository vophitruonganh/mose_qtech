<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<table border="1" cellpadding="0" cellspacing="0" width="100%">
    <thead>
    <tr>
        <td>Sản phẩm</td>
        <td>Số lượng</td>
        <td>Giá</td>
        <td>Thành tiền</td>    
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
        <td>{{$row->post_title}}</td>
        <td>{{$quantity}}</td>
        <td>{{number_format($value["price_new"],0,',',',')}} đ</td>
        <td>{{number_format($quantity*$value["price_new"],0,',',',')}} đ</td>    
    </tr>
    <?php $total+=$quantity*$value["price_new"]; ?>
    @endforeach
    </tbody>
   
</table>
<p style="text-align:right;"><b>Tổng cộng: {{number_format($total,0,',',',')}} đ</b></p>
<script type="text/javascript">
    window.print();
</script>
</body>
</html>