<?php $__env->startSection('titlePage','Chỉnh sửa đơn hàng'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('backend.includes.showErrorValidator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <form id="form" name="form" action="" method="post" enctype="multipart/form-data">
        <?php echo $__env->make('backend.includes.token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
        <input id="order_code" name="order_code" type="hidden" value="<?php echo e($order->order_code); ?>"/>
        <?php /*
        <a href="{{ url('admin/order/print/'.$order->order_code) }}" onclick="window.open(this.href,'targetWindow', 'toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=SomeSize, height=SomeSize'); return false;">in</a>
        */
        ?>
        <div class="row">
            <table class="border">
                <thead>
                    <tr>
                        <td>Product</td>
                        <td>Order Product</td>
                        <td>Price</td>
                        <td>Total</td>
                        <th> </th>
                    </tr>
                </thead>
                <tbody data-bind='foreach: lines'>
                    <tr>
                        <td>
                            <select data-bind='options: list_product, optionsText: "name", optionsCaption: "Select...", value: product'> </select>
                        </td>
                        <td class='quantity'>
                            <input type="number" data-bind='visible: product, value: quantity, valueUpdate: "afterkeydown"' />
                        </td>
                        <td class='price' data-bind='with: product'>
                            <span data-bind='text: formatCurrency(price)'> </span>
                        </td>       
                        <td class='price'>
                            <span data-bind='visible: product, text: formatCurrency(subtotal())' > </span>
                        </td>
                        <td>
                            <a href='#' data-bind='click: $parent.removeLine'>Remove</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button data-bind='click: addLine'>Add product</button>
        </div>
        <div class="row">
            <label for="order_content">Order_content(*)</label>
            <textarea rows="10" cols="100" id="order_content" name="order_content" class="editor"><?php echo e($order->order_content); ?></textarea>
            Total: <span data-bind='text: formatCurrency(grandTotal())'> </span>
        </div>
        <div class="row">
            <button data-bind='click: savePaid'>Paid</button>
            <button data-bind='click: savePending'>Pending</button>
            <button data-bind='click: saveDraft'>Draft</button>
        </div>
    </form>
    <!-- <script src="<?php echo e(asset('public/backend/js/jquery-1.12.4.min.js')); ?>"></script> -->
    <script src="<?php echo e(asset('template/admin/plugins/knockout/knockout-3.4.0.js')); ?>"></script>
    <script type="text/javascript">
        var order_code=$("#order_code").val();
        //thông tin về sản phẩm được thêm
        var existingRows;
        $.ajax({
            async: false,
            url: "admin/order/listProductUpdate/"+order_code,
            success: function(data) {
                existingRows=data;
            }
        });
        //danh sách sản phẩm
        var list_product;
        $.ajax({
            async: false,
            url: "admin/order/listProduct",
            success: function(data) {
                list_product=data;
            }
        });
        
        function formatCurrency(value) {
            return value.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"đ";
        }
        //thông tin 1 dòng order
        //sản phẩm, số lượng, thành tiền
        var CartLine = function(product, quantity) {
            var self = this;

            self.product = ko.observable(product);
            self.quantity = ko.observable(quantity || 1);
            self.subtotal = ko.pureComputed(function() {
                return self.product() ? self.product().price * parseInt("0" + self.quantity(), 10) : 0;
            });    
        };

        var Cart = function(data) {
            var self = this;
            //hiển thị ra các sản phẩm đã thêm trong hóa đơn
            self.lines = ko.observableArray(ko.utils.arrayMap(data, function(row) {
            var rowProduct = ko.utils.arrayFirst(list_product, function(product) {
                return product.post_id == row.post_id;
            });

            return new CartLine(rowProduct, row.om_value);
        }));
        //thành tiền của toàn hóa đơn    
        self.grandTotal = ko.pureComputed(function() {
            var total = 0;
            $.each(self.lines(), function() { total += this.subtotal() })
            return total;
        });
        // Operations
        //thêm sảm phẩm
        self.addLine = function() { self.lines.push(new CartLine()) };
        //xóa 1 sản phẩm đã thêm
        self.removeLine = function(line) { self.lines.remove(line) };
        //lưu order trạng thái 0 - chưa thanh toán
        //thêm thành công trả về trang order
        self.savePaid = function() {
            if(!self.lines() || self.lines().length<=0){
                alert("Danh sách sản phẩm không hợp lệ");
                return;
            }
            if (n = !1, ko.utils.arrayForEach(self.lines(), function(item) {
                item.quantity() <= 0 && (n = !0)
                }), n == !0) {
                    alert("Số lượng không hợp lệ");
                    return;
            }
            var order_code=$("#order_code").val();
            var order_content=$("#order_content").val();
            var _token = $("form[name='form']").find("input[name='_token']").val();
             //kiểm tra có sản phẩm nào chưa
            if(!self.lines() || self.lines()<=0){
                alert("Danh sách sản phẩm không hợp lệ");
                return;
            }
            //kiểm tra ghi chú đã được nhập chưa
            if(order_content==""){
                alert("Chưa nhập ghi chú");
                return;
            }
            
            //thông tin các sản phẩm cần thêm vào order
            var dataToSave = $.map(self.lines(), function(line) {
                //kiểm tra số lượng sản phẩm
                if(line.quantity()<=0){
                    alert("Số lượng không hợp lệ");
                    return;
                }
                return line.product() ? {

                    post_id: line.product().post_id,
                    quantity: line.quantity(),
                    sub_total: line.subtotal(),
                    order_content: order_content,
                    order_status: 0
                } : undefined
           
            });
            if(dataToSave.length==0){
                alert("Chưa có sản phẩm nào trong giỏ hàng");
                return;
            }
            //dữ liệu thêm vào order
            var data=JSON.stringify(dataToSave);      
            $.ajax({
                url: 'admin/order/edit/'+order_code,
                type:"post",
                data:{'_token':_token,'data':data},
                dataType: 'text',
                success: function (data) {
                    window.location.href = 'admin/order';
                },
            });

        };
        //end savePaid
        //lưu order trạng thái 1 - đã thanh toán
        //thêm thành công trả về trang order
        self.savePending = function() {
            var order_code=$("#order_code").val();
            var order_content=$("#order_content").val();
            var _token = $("form[name='form']").find("input[name='_token']").val();
            //kiểm tra có sản phẩm nào chưa
            if(!self.lines() || self.lines()<=0){
                alert("Danh sách sản phẩm không hợp lệ");
                return;
            }
            //kiểm tra ghi chú đã được nhập chưa
            if(order_content==""){
                alert("Chưa nhập ghi chú");
                return;
            }
            //thông tin các sản phẩm cần thêm vào order
            var dataToSave = $.map(self.lines(), function(line) {
                //kiểm tra số lượng sản phẩm
                if(line.quantity()<=0){
                    alert("Số lượng không hợp lệ");
                    return;
                }
                return line.product() ? {
                    post_id: line.product().post_id,
                    quantity: line.quantity(),
                    sub_total: line.subtotal(),
                    order_content: order_content,
                    order_status: 1
                } : undefined
           
            });
            //dữ liệu thêm vào order
            var data=JSON.stringify(dataToSave)
            $.ajax({
                url: 'admin/order/edit/'+order_code,
                type:"post",
                data:{'_token':_token,'data':data},
                dataType: 'text',
                success: function (data) {
                    window.location.href = 'admin/order';
                },
            });
        };
        //end savePending
        //lưu order trạng thái 2 - Lưu nháp
        //thêm thành công báo lên đã cập nhật thành công
        self.saveDraft = function() {
            if(!self.lines() || self.lines().length<=0){
                alert("Danh sách sản phẩm không hợp lệ");
                return;
            }
            if (n = !1, ko.utils.arrayForEach(self.lines(), function(item) {
                item.quantity() <= 0 && (n = !0)
                }), n == !0) {
                    alert("Số lượng không hợp lệ");
                    return;
            }
            var order_code=$("#order_code").val();
            var order_content=$("#order_content").val();
            var _token = $("form[name='form']").find("input[name='_token']").val();
            //kiểm tra có sản phẩm nào chưa
            if(!self.lines() || self.lines()<=0){
                alert("Danh sách sản phẩm không hợp lệ");
                return;
            }
            //thông tin các sản phẩm cần thêm vào order
            var dataToSave = $.map(self.lines(), function(line) {
                return line.product() ? {
                    post_id: line.product().post_id,
                    quantity: line.quantity(),
                    sub_total: line.subtotal(),
                    order_content: order_content,
                    order_status: 3
                } : undefined
           
            });
            if(dataToSave.length==0){
                alert("Chưa có sản phẩm nào trong giỏ hàng");
                return;
            }
            //dữ liệu thêm vào order
            var data=JSON.stringify(dataToSave)
            $.ajax({
                url: 'admin/order/edit/'+order_code,
                type:"post",
                data:{'_token':_token,'data':data},
                dataType: 'text',
                success: function (data) {
                    // alert(data);
                },  
            });
       
        };
    };
    ko.applyBindings(new Cart(existingRows));
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>