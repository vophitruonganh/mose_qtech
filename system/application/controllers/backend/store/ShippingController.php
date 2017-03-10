<?php

namespace App\Http\Controllers\backend\store;

use Illuminate\Http\Request;

use App\Http\Requests;
//use App\Http\Controllers\BackendController;
use App\Http\Controllers\backend\BackendController;
use View;
/*
 * Use Library of Laravel
 */
use App\Models\Order;
use App\Models\OrderMeta;
use App\Models\PostMeta;
use App\Models\Product;
use App\Models\Variant;
use App\Models\VariantMeta;
use App\Models\Taxonomy;
use App\Models\Option;
use App\Models\Attachment;
use App\Models\Customer;
use App\Models\CustomerMeta;
use App\Models\Provinces;
use App\Models\Districts;
use App\Models\Discount;
use Validator;
use DB;
use Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ShippingController extends BackendController
{
    public function paginate($items,$perPage,$pageStart=1)
    {
        //offset: vị trí bắt đầu cắt trong mảng
        //perPage: số lượng phần tử mỗi trang
        $offSet = ($pageStart * $perPage) - $perPage; 
            
        // Get only the items you need using array_slice
        $itemsForCurrentPage = array_slice($items, $offSet, $perPage, true);
        return new LengthAwarePaginator($itemsForCurrentPage, count($items), 
        $perPage,Paginator::resolveCurrentPage(), array('path' => Paginator::resolveCurrentPath()));
    }
	public function index(Request $request)
    {
        $option=new Option;
        $order_prefix=$option->getOptionValue_option('order_prefix');
        $order_suffix=$option->getOptionValue_option('order_suffix');
        $data = $request->all();
        $order = new Order;

        // return $_GET["order_status"];
        $pageNo = $request->input('page',1);
        $user_id = isset($data['user_id']) ? $data['user_id'] : 0;
        $check = isset($data['check']) ? $data['check'] : [];
        $select_action = isset($data['select_action']) ? $data['select_action'] : '';
        $order_status = isset($data['order_status']) ? $data['order_status'] : 'all';
        $type = isset($data['type']) ? $data['type'] : '';
        $search = strip_tags(trim(isset($data['search']) ? $data['search'] : ''));

        $arr_order_status = ['all','0', '1','3','4'] ;
        $arr_select_action = ['edit', 'trash', 'restore', 'delete'] ;

        /*kiểm tra kiểu request*/
        $type_request = '';
        if( $request->isMethod('post') && $request->ajax()){
            $type_request = 'ajax';
        }

        $order_count = [];
        $order_count['all']= $order->Count_order_status('all');
        $order_count['paid'] = $order->Count_order_status('0');
        $order_count['pending'] = $order->Count_order_status(1);
        $order_count['draft'] = $order->Count_order_status(3);
        $order_count['trash'] = $order->Count_order_status(4);

        /* Lấy dữ liệu từ DB*/
        $order_arr = [];
        $order_arr['user_id'] = $user_id ;
        $order_arr['order_status'] = $order_status;
        $ordercodes = $order-> Search_order($search , $order_arr);
        //Danh sách hóa đơn
        $arrOrder=[];//mảng lưu thông tin các hóa đơn
        if(count($ordercodes)>0){
            foreach ($ordercodes as $data) {

                //chi tiết hóa đơn

                // $orders=DB::table('qm_order')
                // ->join('qm_user','qm_user.user_id','=','qm_order.user_id')
                // ->join('qm_ordermeta','qm_order.order_id','=','qm_ordermeta.order_id')
                // ->where('order_code','=',$data->order_code)
                // ->get();
                $orders = $order->Get_order_detail($data->order_code);
                $sum=0;               
                foreach ($orders as $order) {

                    $value=decode_serialize($order->om_value);    
                    foreach($value as $item){
                        $sum = $sum + ($item['sub_total'] * $item['quantity']);
                    } 
                }
                $arr=array(
                    'order_code' => $data->order_code,
                    'order_date' => $data->date_create,
                    'customer_id' => $data->customer_id,
                    'customer_fullname' => $order->customer_fullname,
                    'order_status' => $data->order_status,
                    'total' => $sum
                );
                array_push($arrOrder,$arr);
            }

        }

        /* End lấy dữ liệu từ DB*/ 
        if( $type_request == 'ajax' ){
            if(!in_array($order_status, $arr_order_status)){
                return '{"Response":"False","Redirect":"'.url('admin/order').'"}';
            }
            if(!in_array($select_action, $arr_select_action) && $select_action ){
                return '{"Response":"False","Redirect":"'.url('admin/order').'"}';
            }
            if($type = 'action'){
                $count = count($check);
                if($select_action == 'edit' && $count){
                    $output = Array('Response'=>'True','Redirect'=>url('admin/order/edit/'.$check[0]));
                    return $output;
                }else if($select_action == 'trash' && $count){
                    $order->Action_order($check,'trash');
                }else if($select_action == 'restore' && $count){
                    $order->Action_order($check,'restore');
                }else if($select_action == 'delete' && $count){
                    $order->Action_order($check,'delete');
                }
            }
            $list_order = $this->paginate($arrOrder, 10,$pageNo);
            $data_view = array();
            $data_view['select_action'] = $select_action;
            $data_view['search']    = $search;
            $data_view['order_status'] = $order_status;
            $data_view['order_count']     = $order_count;
           // $data_view['sortBy']    =   $sortBy;
             return $this->orderView($list_order,$data_view);

        }else{
            if(!in_array($order_status, $arr_order_status)){
                return redirect('admin/order');
            }
            if(!in_array($select_action, $arr_select_action) && $select_action ){
                return redirect('admin/order');
            }
            /*--end check--*/
            if($select_action){
                $count = count($check);
                if($select_action == 'edit' && $count){
                    return redirect('admin/order/edit/'.$check[0]);
                }else if($select_action == 'trash' && $count){
                    $order->Action_order($check,'trash');
                }else if($select_action == 'restore' && $count){
                    $order->Action_order($check,'restore');
                }else if($select_action == 'delete' && $count){
                    $order->Action_order($check,'delete');
                }
            }

            $list_order = $this->paginate($arrOrder, 10,$pageNo);
            $order_page = [];
            $order_page['order_status'] = $order_status ;
            $order_page['search'] = $search ;
            $order_page['user_id'] = $user_id ;
            return view('backend.pages.store.order.listOrder',[
                'list_order' => $list_order,
                'order_count' => $order_count,
                'order_status' => $order_status,
                'search' => $search,
                'user_id'   => $user_id,
                'pagination'    => $order_page,
                'order_prefix'    => $order_prefix,
                'order_suffix'    => $order_suffix,
            ]);
        }
        
        

        
    }

    private function orderView($list_order , $data_view = array()){
        $objdata = Array('Response'=>'False','Page'=>'','List'=>'');
        $view = view('backend.pages.store.order.listViewOrder',[
                'list_order'         => $list_order,
                'order_count'         => $data_view['order_count'],
                'search'        => $data_view['search'],
                'order_status'   => $data_view['order_status'],
            //    'sortBy'        => $data_view['sortBy']
            ]);
        $objdata['Page'] = urlencode($list_order->render());
        
        if($data_view['search']){
            $objdata['Page'] = urlencode($list_order->appends(array('search' => $data_view['search'],'order_status' => $data_view['order_status']))->render());
        }else {
            $objdata['Page'] = urlencode($list_order->appends(array('order_status' => $data_view['order_status']))->render());
        }
        $objdata['List'] = urlencode($view);
        if($objdata['List']){
            $objdata['Response'] = 'True';
        }
        if($data_view['select_action'] == 'trash'){
            $objdata['Message'] = 'Xóa đơn hàng thành công!';
        }
        if($data_view['select_action'] == 'delete'){
            $objdata['Message'] = 'Đơn hàng đã được xóa vĩnh viễn!';
        }
        if($data_view['select_action'] == 'restore'){
            $objdata['Message'] = 'Khôi phục đơn hàng thành công!';
        }
        return $objdata;
    }
    // private function count_order_status($order_status = '')
    // {
    //     // $arr_page_status = array('all','public','pending','trash','draft');
    //     $arr_order_status = array('all',0,1,3);
    //     if(!in_array($order_status, $arr_order_status))
    //         return '0';
    //     if($order_status=='all'){
    //         return DB::table('qm_order')->where('order_status','<>','trash')->distinct("order_code")->count("order_code"); 
    //     }else {
    //         return DB::table('qm_order')->where('order_status',$order_status)->distinct("order_code")->count("order_code");
    //     }
    // }

    // private function postAction($checks,$post_action)
    // {
    //     /*--Action--*/
    //      if(count($checks)==0)
    //      {
    //          return redirect('admin/order');
    //      }

    //      $arr_action = ['trash','edit'];
    //      if(!in_array($post_action, $arr_action))
    //      {
    //          return redirect('admin/order');
    //      }
         
    //      //Check checkbox
    //      $count = DB::table('qm_order')->whereIn('order_code',$checks)->distinct("order_code")->count("order_code");
    //      if( $count != count($checks))
    //      {
    //          return redirect('admin/order');
    //      }
    //      //End checkbox
    //      if($post_action == 'trash')
    //      {
    //         foreach ($checks as $check) 
    //         {
    //             DB::table('qm_order')->where('order_code',$check)->update(['order_status' => $post_action]);
    //         }
    //         return redirect('admin/order');
    //      }
         
    //      if($post_action == 'edit')
    //      {
    //         return redirect('admin/order/edit/'.$checks[0]);
    //      }
    //     /*--End action--*/
    // }

    // public function draft_order(Request $request)
    // {
    //     $pageNo = $request->input('page',1);
    //     $ordercodes=Order::select('user_id','order_code','order_date','order_status')
    //     ->where('order_status','<>',0)
    //     ->groupBy("order_code")->get();

    //     $arrOrder=[];
    //     foreach ($ordercodes as $data) {
    //         $orders=DB::table('qm_order')
    //         ->join('qm_postmeta','qm_order.post_id','=','qm_postmeta.post_id')
    //         ->join('qm_ordermeta','qm_order.order_id','=','qm_ordermeta.order_id')
    //         ->where('order_code','=',$data->order_code)
    //         ->get();
    //         $sum=0;
    //         foreach ($orders as $order) {   
    //             $value=decode_serialize($order->meta_value);
    //             $sum+=$order->om_value*$value["price_new"];
    //         }
    //         $arr=array(
    //             'order_code' => $data->order_code,
    //             'order_date' => $data->order_date,
    //             'user_id' => $data->user_id,
    //             'order_status' => $data->order_status,
    //             'total' => $sum
    //         );
    //         array_push($arrOrder,$arr);
    //     }
    //     $list_order = $this->paginate($arrOrder, 10,$pageNo);      
    //     return view('backend.pages.store.order.draft',[
    //         'list_order' => $list_order,
    //     ]);
    // }
    
    public function order_list($order_status,Request $request)
    {
        $_order = new Order;
        $status;
        $arrayOrderStatus = ["paid","pending","draft"];
        if( !in_array($order_status,$arrayOrderStatus) )
        {
                return redirect('admin/order');
        }
        if($order_status=="paid"){
            $status=0;
        }
        if($order_status=="pending"){
            $status=1;
        }
        if($order_status=="draft"){
            $status=3;
        }
        
        $pageNo = $request->input('page',1);
        // $ordercodes=Order::select('user_id','order_code','order_date','order_status')
        // ->where('order_status','=',$status)
        // ->groupBy("order_code")->get();
        $ordercodes = $_order->Get_order_status($status)->select('user_id','order_code','order_date','order_status')->groupBy("order_code")->get(); 
        $arrOrder=[];
        foreach ($ordercodes as $data) {
            // $orders=DB::table('qm_order')
            // ->join('qm_postmeta','qm_order.post_id','=','qm_postmeta.post_id')
            // ->join('qm_ordermeta','qm_order.order_id','=','qm_ordermeta.order_id')
            // ->where('order_code','=',$data->order_code)
            // ->get();
            $orders = $_order->Get_order_detail( $data->order_code);
            $sum=0;
            foreach ($orders as $order) {   
                $value=decode_serialize($order->meta_value);
                $sum+=$order->om_value*$value["price_new"];
            }
            $arr=array(
                'order_code' => $data->order_code,
                'order_date' => $data->order_date,
                'user_id' => $data->user_id,
                'order_status' => $data->order_status,
                'total' => $sum
            );
            array_push($arrOrder,$arr);
        }
        $list_order = $this->paginate($arrOrder, 10,$pageNo);      
        return view('backend.pages.store.order.draft',[
            'list_order' => $list_order,
        ]);
    }
    
    public function create()
    {
        $order = new Order;
        $_max_order = $order->max('order_code');
        $order_code=0;
        //mã hóa đơn bắt đầu từ 1000
        if(!$_max_order){
            $order_code=1000;
        }
        else{
            $order_code= $_max_order+1;
        }
        $provincesObject = new Provinces;
        $districtsObject = new Districts;
        $provinces = $provincesObject->Get_all_provinces();
        $districts = [];
        if( Session::has('province') )
        {
            $districts = $districtsObject->Get_districts_by_province_id(Session::get('province'));
        }

        return view('backend.pages.store.order.createOrder',[
            'order_code'=>$order_code,
            'provinces' => $provinces,
            'districts' => $districts,
        ]);
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        $datajson = json_decode($data["data"]);
        $order = new Order;
        $order_meta = new Ordermeta;
        foreach ($datajson as $data) {
            $order_arr = [];
            $order_arr['order_code'] = $data->order_code;
            $order_arr['user_id'] = Session::get('user_id');
            $order_arr['post_id'] = $data->post_id;
            $order_arr['order_ems'] = '1';
            $order_arr['order_content'] = $data->order_content;;
            $order_arr['order_payment'] = 0;
            $order_arr['order_status'] = $data->order_status;
            $order_arr['order_ship'] = 0;
            //xử lý thời gian
            $time=time();
            $order_arr['order_date'] = $time;
            $order_id = $order-> Insert_order($order_arr);
             unset($order_arr);    
            //Thêm  order meta

            $dataOrder=[];
            $dataOrder[$data->post_id]['sub_total']= $data->sub_total;
            $dataOrder[$data->post_id]['quantity']= $data->quantity;
            $om_value = encode_serialize($dataOrder);
            $order_meta -> Insert_ordermeta($order_id, 'order_detail', $om_value);
            unset($dataOrder);
            
        }
		
		/*
         * ADD DATABASE LOG
         */
        addTableLog("App\Models\Logs", Session::get('user_id'), 'order', __FUNCTION__, "0,0,$data->order_code;");
        /* END SAVE DATABASE LOG */
		
        return "Insert Success";
        
    }

    //danh sách sản phẩm khách hàng đặt mua theo mã hóa đơn
    public function ListProductUpdate($ordercode)
    {
        $_order = new Order;
        // $orders=DB::table('qm_order')
        //     ->select("qm_ordermeta.om_value")
        //     ->join('qm_post','qm_order.post_id','=','qm_post.post_id')
        //     ->join('qm_ordermeta','qm_order.order_id','=','qm_ordermeta.order_id')
        //     ->where('qm_order.order_code','=',$ordercode)
        //     ->get();
            $orders = $_order->Get_order_detail( $ordercode);
            $arr = [];

        foreach ($orders as $key => $order) {
            $data = decode_serialize($order->om_value);

            foreach($data as $k => $v){
                
                $arr[$key]['post_id'] = $k;
                $arr[$key]['om_value'] = $v['quantity'];
            }
        }
        return $arr;
    }
    
    //danh sách sản phẩm
    public function ListProduct()
    {
        $_term = new Term; 
        // $terms=DB::table('qm_term')->join('qm_termmeta','qm_term.term_id','=','qm_termmeta.term_id')
        //                             ->where('term_type','product_promotion')
        //                             ->where('qm_termmeta.meta_key','product_discount')
        //                             ->get();
        $terms = $_term->Get_all_discount('on');
        
        $posts = DB::table('qm_product')
        ->join('qm_productmeta','qm_product.product_id','=','qm_productmeta.product_id')->where('qm_productmeta.meta_key','product_data')->get();

        

        $arrPosts=[];
        $today=time();
        foreach ($posts as $product) {
            $percent_discount=0;
            $percent_temp=0;
            $vnd_discount=0;
            $price=0;
            $value=decode_serialize($product->meta_value);
            $price_old = $value['price_old'];
            $price_new = $value['price_new'];
            foreach ($terms as $term) {
                $termvalue=decode_serialize($term->meta_value);
                if($termvalue["discount_offer"]==4 && $termvalue["discount_active"]==1 && $termvalue["dv_count"]==1){
                    if($termvalue["date_limit"]=="true" || $termvalue["date_limit"]=="false" && $termvalue["date_end"]>=$today){
                        if($termvalue["dv_value"]==$product->product_id){
                            if($termvalue['discount_type']==1){
                                $vnd_discount_temp = $termvalue["discount_take"];
                                if($vnd_discount_temp > $vnd_discount){
                                    $vnd_discount = $vnd_discount_temp;
                                    // $price = $value['price_new'] - $termvalue["discount_take"];
                                }
                            }
                            if($termvalue['discount_type']==2){
                                $percent_temp=$termvalue["discount_take"];
                                if($percent_temp > $percent_discount){
                                    // $price=$value['price_new'] * (1 - $percent_temp/100);
                                    $percent_discount=$percent_temp;
                                }
                                                            
                            }
                        }
                    }
                }
            }

                       

            if($percent_discount!=0 || $vnd_discount!=0)
            {

                $percent_discount_vnd = round(($vnd_discount/$value['price_new'])*100);
                if($percent_discount < $percent_discount_vnd){
                    $percent_discount = $percent_discount_vnd;
                    $price = $value['price_new'] - $vnd_discount;
                }
                else{
                    $price = $value['price_new'] * (1 - $percent_discount/100);
                }
                if($vnd_discount==0){
                    if(($value['price_new'] * (1 - $percent_discount/100)) > $vnd_discount){
                        $vnd_discount = $value['price_new'] * $percent_discount/100;
                    }
                }
                else{
                    if(($value['price_new'] * (1 - $percent_discount/100)) < $vnd_discount){
                        $vnd_discount = $value['price_new'] * $percent_discount/100;
                    }
                }

                //giá cũ gáng thành giá khuyễn mãi nếu có khuyến mãi
             
            }
             if( $price>0 )
                {
                    $price_old = $value['price_new'];
                    $price_new = $price;
                }
            $arr=array(
                'product_code' => $value['product_code'],
                'name'         => $product->product_title,
                'price'        => intval($price_new),
                'price_old'        => intval($price_old),
                'post_id'      => $product->product_id,
                
            );
            array_push($arrPosts,$arr);

        }

        return $arrPosts;
    }
    public function edit($ordercode)
    {   
        $_order = new Order;
        $order= $_order->Get_order_code($ordercode)->first();

        if(count($order)==0)
        {
            return redirect('admin/order');
        }
        //nếu là đã thanh toán thì cho xem chi tiết hóa đơn (order_status=1)
        //nếu là chưa thanh toán hoặc lưu nháp thì cho phép chỉnh sửa (order_status=0 or order_status=2)
        if($order->order_status==0){
            $orders = $_order-> Get_order_detail($ordercode);
            return view('backend.pages.store.order.detail',[
                'order' => $order,
                'orders' => $orders
            ]);
        }
        return view('backend.pages.store.order.edit',[
            'order' => $order,
        ]);
    }
    
    public function update($ordercode,Request $request)
    {
        $order=new Order;
        $order_meta= new Ordermeta;
        //Xóa dữ liệu cữ
        $order-> Delete_order($ordercode, 'update_order');
        
        $data = $request->all();
        $datajson=json_decode($data["data"]);
        // return $datajson;
        foreach ($datajson as $data) {
            $order_arr = [] ;
            $order_arr['order_code'] = $ordercode;
            $order_arr['user_id'] = Session::get('user_id');
            $order_arr['post_id'] = $data->post_id;
            $order_arr['order_ems'] = 1;
            $order_arr['order_content'] = $data->order_content;
            $order_arr['order_payment'] = 0;
            $order_arr['order_status'] = $data->order_status;
            $order_arr['order_ship'] = 0;
            //xử lý thời gian
            $time=time();
            $order_arr['order_date'] = $time;
            $order_id = $order-> Insert_order($order_arr);
            unset($order_arr);    

            //Thêm  order meta

            $dataOrder=[];
            $dataOrder[$data->post_id]['sub_total']= $data->sub_total;
            $dataOrder[$data->post_id]['quantity']= $data->quantity;
            $om_value = encode_serialize($dataOrder);
            $order_meta -> Insert_ordermeta($order_id, 'order_detail', $om_value);
            unset($dataOrder);
            
        }
        
		/*
         * ADD DATABASE LOG
         */
        addTableLog("App\Models\Logs", Session::get('user_id'), 'order', __FUNCTION__, "0,0,$ordercode");
        /* END SAVE DATABASE LOG */
		
        return "Cập nhật thành công";
    }
    public function destroy($ordercode)
    {
        $order = new Order;
        // Đã xóa order và order meta
        $order->Delete_order($ordercode);
        // $order_meta = new Ordermeta;
        // //$orders = Order::where("order_code",$ordercode)->get();
        // $orders = $order->Get_order_code($ordercode)->get();
        // foreach ($orders as $order) {
        //      //Ordermeta::where("order_id","=",$order->order_id)->delete();
        //      $order_meta -> Delete_order_meta($order->order_id);
        //  }
        //  Order::where("order_code",$ordercode)->delete();

		
		/*
          * ADD DATABASE LOG
          */
         addTableLog("App\Models\Logs", Session::get('user_id'), 'order', __FUNCTION__, "0,0,$ordercode");
         /* END SAVE DATABASE LOG */
		
        return redirect('admin/order');
    }



//===============================================PENDING=======================================================
    // private function getTerms(){
    //     $term = new Term;
    //     // $terms=DB::table('qm_term')
    //     //                         ->join('qm_termmeta','qm_term.term_id','=','qm_termmeta.term_id')
    //     //                         ->where('term_type','product_promotion')
    //     //                         ->where('qm_termmeta.meta_key','product_discount')
    //     //                         ->get();
    //     $terms = $term -> Get_all_discount('on');
    //     return $terms;
    // }

    // private function discount($product,$terms){
    //     $arrProduct = [];
    //     if(!empty($terms)){
    //         $today = time();
    //         $percent_discount=0;
    //         $percent_temp=0;
    //         $vnd_discount=0;
    //         $price=0;
    //         $value = decode_serialize($product->meta_value);
    //         $groupProducts=DB::table('qm_term')->join('qm_term_relationships','qm_term_relationships.term_id','=','qm_term.term_id')->where('term_type','group_product')->get();

    //         foreach($terms as $term){
    //             $termmeta=decode_serialize($term->meta_value);

    //             //check discount
    //             if($termmeta["discount_promotion"]==2 && $termmeta["dv_count"]==1 && $termmeta["discount_active"]==1){
    //                 if(($termmeta["date_limit"]=="true") || ($termmeta["date_limit"]=="false" && $termmeta["date_end"]>=$today)){
    //                     if($termmeta["discount_offer"]==3 ){
    //                         foreach ($groupProducts as $groupProduct) {
    //                             if($product->post_id==$groupProduct->post_id){
    //                                 if($termmeta['dv_value']==$groupProduct->term_id){
    //                                     if($termmeta['discount_type']==1){
    //                                         $vnd_discount = $termmeta["discount_take"];
    //                                         if($vnd_discount > $price){
    //                                             $price = $value['price_new'] - $termmeta["discount_take"];
    //                                         }
    //                                     }
    //                                     if($termmeta['discount_type']==2){
    //                                         $percent_temp=$termmeta["discount_take"];
    //                                         if($percent_temp > $percent_discount){
    //                                             $price=$value['price_new'] * (1 - $percent_temp/100);
    //                                             $percent_discount=$percent_temp;
    //                                         }
    //                                     }
                        
    //                                 }
    //                             }
    //                         }
    //                     }
    //                     if($termmeta["discount_offer"]==4 ){
    //                         if($termmeta['dv_value']== $product->post_id){
    //                             if($termmeta['discount_type']==1){
    //                                 $vnd_discount_temp = $termmeta["discount_take"];
    //                                 if($vnd_discount_temp > $vnd_discount){
    //                                     $vnd_discount = $vnd_discount_temp;
    //                                     // $price = $post['price_new'] - $termmeta["discount_take"];
    //                                 }
    //                             }
    //                             if($termmeta['discount_type']==2){
    //                                 $percent_temp=$termmeta["discount_take"];
    //                                 if($percent_temp > $percent_discount){
    //                                     // $price=$post['price_new'] * (1 - $percent_temp/100);
    //                                     $percent_discount=$percent_temp;
    //                                 }
                                    
    //                             }

    //                         }
                                
    //                     }
    //                 }
    //             }
    //             //end check discount
    //         }
        
        
    //         if($percent_discount!=0 || $vnd_discount!=0)
    //         {
        
    //             $percent_discount_vnd = round(($vnd_discount/$value['price_new'])*100);
    //             if($percent_discount < $percent_discount_vnd){
    //                 $percent_discount = $percent_discount_vnd;
    //                 $price = $value['price_new'] - $vnd_discount;
    //             }
    //             else{
    //                 $price = $value['price_new'] * (1 - $percent_discount/100);
    //             }
    //             if($vnd_discount==0){
    //                 if(($value['price_new'] * (1 - $percent_discount/100)) > $vnd_discount){
    //                     $vnd_discount = $value['price_new'] * $percent_discount/100;
    //                 }
    //             }
    //             else{
    //                 if(($value['price_new'] * (1 - $percent_discount/100)) < $vnd_discount){
    //                     $vnd_discount = $value['price_new'] * $percent_discount/100;
    //                 }
    //             }
    //             $arrProduct=array(
    //                 'post_id'       => $product->post_id,
    //                 'post_title'    => $product->post_title,
    //                 'price'         => $price, 
    //                 );
    //         }else{
    //             $arrProduct=array(
    //                 'post_id'        => $product->post_id,
    //                 'post_title'     => $product->post_title,
    //                 'price'           => $value['price_new'],
    //             );
                
    //         }
    //     }

    //     return $arrProduct;
    // }

    //GIO HANG DANG XU LY
    public function orderPending(Request $request){
        Session::forget('order_code');
        $pageNo = $request->input('page',1);
		//danh sách hóa đợn
		$ordercodes=Order::select('user_id','order_code','order_date','order_status','order_id')->where('order_status',2)->groupBy("order_code")->get();

		
		$arrOrder=[];//mảng lưu thông tin các hóa đơn
        
		foreach ($ordercodes as $data) {
		    //chi tiết hóa đơn
		
		    $orders=DB::table('qm_order')
                		    ->join('qm_ordermeta','qm_order.order_id','=','qm_ordermeta.order_id')
                		    ->where('order_code','=',$data->order_code)
                		    ->where('order_status','=',2)
                		    ->get();
            $sum=0;               
		    foreach ($orders as $order) {
		        $value=decode_serialize($order->om_value);   
                foreach($value as $item){
                    $sum = $sum + ($item['sub_total'] * $item['quantity']);
                } 
		    }
		
		    $arr=array(
		        'order_code' => $data->order_code,
		        'order_date' => $data->order_date,
		        'user_id' => $data->user_id,
		        'total' => $sum
		    );
		    array_push($arrOrder,$arr);
		}
		
		$list_order = $this->paginate($arrOrder, 10,$pageNo);
		return view('backend.pages.store.order.pending',[
		    'list_order' => $list_order,
		]);
    }  

    public function orderPendingEdit($orderCode){
        $_order = new Order;
        //$order=Order::where('order_code',$orderCode)->first();
        $order = $order->Get_order_code($orderCode)->first();
        if(count($order)==0)
        {
            return redirect('admin/order/pending');
        }

        return view('backend.pages.store.order.edit_pending',[
            'order' => $order,
        ]);
    }
    
    public function orderPendingUpdate($orderCode,Request $request){
        $order=new Order;
        $order_meta= new Ordermeta;
        //Xóa dữ liệu cũ
        $order-> Delete_order($orderCode, 'update_order');
		// $orders=Order::where("order_code",$orderCode)->get();
  //       foreach ($orders as $order) {
  //           Ordermeta::where("order_id","=",$order->order_id)->delete();
  //       }
  //       Order::where("order_code",$orderCode)->delete();
        $data = $request->all();

        $datajson=json_decode($data["data"]);  

        foreach ($datajson as $data) {
            $order_arr = [] ;
            $order_arr['order_code'] = $ordercode;
            $order_arr['user_id'] = Session::get('user_id');
            $order_arr['post_id'] = $data->post_id;
            $order_arr['order_ems'] = 1;
            $order_arr['order_content'] = null;
            $order_arr['order_payment'] = 0;
            $order_arr['order_status'] = $data->order_status;
            $order_arr['order_ship'] = 0;
            //xử lý thời gian
            $time=time();
            $order_arr['order_date'] = $time;
            $order_id = $order-> Insert_order($order_arr);
            unset($order_arr);    

            //Thêm  order meta

            $dataOrder=[];
            $dataOrder[$data->post_id]['sub_total']= $data->sub_total;
            $dataOrder[$data->post_id]['quantity']= $data->quantity;
            $om_value = encode_serialize($dataOrder);
            $order_meta -> Insert_ordermeta($order_id, 'order_detail', $om_value);
            unset($dataOrder);
        }

    }
    
    public function orderPendingDelete($ordercode)
    {
        $order = new Order;
        $order-> Delete_order($ordercode, 'update_order');
        // $orders=Order::where("order_code",$ordercode)->get();
        // foreach ($orders as $order) {
        //     Ordermeta::where("order_id","=",$order->order_id)->delete();
        // }
        // Order::where("order_code",$ordercode)->delete();
    
        return redirect('admin/order/pending');
    }
    public function printorder($ordercode){
        $_order = new Order;
        //$order=Order::where('order_code',$ordercode)->first();
        $order = $_order -> Get_order_code($ordercode)->first();
        if(count($order)==0)
        {
            return '';
        }
        $orders = $_order->Get_order_detail( $ordercode );
        // $orders=DB::table('qm_order')
        //     ->join('qm_postmeta','qm_order.post_id','=','qm_postmeta.post_id')
        //     ->join('qm_ordermeta','qm_order.order_id','=','qm_ordermeta.order_id')
        //     ->join('qm_post','qm_order.post_id','=','qm_post.post_id')
        //     ->where('order_code','=',$ordercode)
        //     ->get();
        return view('backend.pages.store.order.print',[
            'order' => $order,
            'orders' => $orders
        ]);
    }

    public function GetProductList(Request $request)
    {
        $data= $request->all();
        $product = new Product;
        $variant = new Variant;
        $variant_meta = new VariantMeta;
        
        $objdata = Array('Response'=>'False','List'=>'');
        if($request->ajax()){
            $search = isset($data['search_product']) ? $data['search_product']: '';
            $product_list = $product -> Get_product_list_order( $search);
            $array_product=[];
            foreach ($product_list as $product)
            {
                $image_product=decode_serialize($product->product_image);
                $image_product=$image_product[0];
                $url_image=$this->Get_url_image($image_product);
                $product_variant=$variant->Get_variant_product_id($product->product_id);

                
                $array_variant=[];

                foreach ($product_variant as $variant) {
                    $variant_title='';
                    $variant_meta_list=$variant_meta->Get_variant_meta_id($variant->variant_id);

                    foreach ($variant_meta_list as $value) {
                        $variant_title.=$value->variant_value.' / ';
                    }
                    $variant_title=substr($variant_title, 0, -2);
                    $image_variant=$this->Get_url_image($variant->image);
                     array_push($array_variant, [
                        "variant_id"=>$variant->variant_id,
                        "variant_title"=>$variant_title,
                        "price_old"=>$variant->price_old,
                        "price_new"=>$variant->price_new,
                        "variant_quantity"=>$variant->quantity,
                        "weight"=>$variant->weight,
                        "sku"=>$variant->sku,
                        "barcode"=>$variant->barcode,
                        "ship"=>$variant->ship,
                        "image"=>$image_variant,
                        "tracking_policy"=>$variant->tracking_policy,
                        "out_of_stock"=>$variant->out_of_stock
                        ]);
                }
                 array_push($array_product, [
                    "product_id" => $product->product_id,
                    "product_name"=>$product->product_title,
                    "product_image" => $url_image,
                    "product_variant"=>$array_variant
                    ]);
            }
            //return $array_product;
            $view = view('backend.pages.store.product.getOrderProduct',[
                    'product_list'         => $array_product,
            ]);

            //'{"product_id":"","product_name":"","product_image":"","product_variant":[{"variant_id":"","variant_title":"","price_old":"","price_new":"","variant_quantity":"","weight":"","sku":"","barcode":"","ship":"","image":"","tracking_policy":"","out_of_stock":""},{"variant_id":"","variant_title":"","price_old":"","price_new":"","variant_quantity":"","weight":"","sku":"","barcode":"","ship":"","image":"","tracking_policy":"","out_of_stock":""}]}';
            return (string) $view;
            if($objdata['List']){
                $objdata['Response'] = 'True';
            }
           
        }
        print_r($objdata);exit();
        return Response::json($objdata);
         $objdata = json_encode($objdata, JSON_HEX_QUOT | JSON_HEX_TAG);

        // $search = isset($data['search_product']) ? $data['search_product']: '';
        // $array_product=[];
        // $product_list = $product -> Get_product_list_order( $search);
        
        // return $array_product[0];
        return $objdata;

    }
    public function Get_url_image($image_product='')
    {
        $attachment = new Attachment;
        $url_image='';
        if( strlen($image_product) > 0 )
        {
            if( !filter_var($image_product, FILTER_VALIDATE_URL) )
            {
                $query = $attachment->get_attachment_post($image_product);
                if( $query != null )
                {
                    $url_image=$query->attachment_url;
                }
            }
            else
            {
                if( @getimagesize($image_product) != false )
                {
                    $url_image=$image_product;
                }
            }
        }
        return $url_image;
    }



    public function GetCustomerList(Request $request)
    {
        $data= $request->all();
        $customer = new Customer;
        $districts = new Districts;
        $provinces = new Provinces;
        $order = new Order;
        $objdata = Array('Response'=>'False','List'=>'');

        if($request->ajax()){
            $search = isset($data['search_customer']) ? $data['search_customer']: '';
            $customer_list = $customer->Get_customer_list_order( $search);
            $customer_product=[];
            foreach ($customer_list as $customer) {
                $district_customer = $districts->get_district_name($customer->customer_district,$customer->customer_province);
                $province_customer = $provinces->get_province_name($customer->customer_province);
                $order_count = $order->Count_order_customer($customer->customer_id);
                array_push($customer_product, [
                    "customer_id" => $customer->customer_id,
                    "full_name" => $customer->customer_fullname,
                    "phone" =>$customer->customer_phone,
                    "email" =>$customer->customer_email,
                    "address" =>$customer->customer_address,
                    "district_id" =>$customer->customer_district,
                    "district_name" =>$district_customer,
                    "province_id" =>$customer->customer_province,
                    "province_name" =>$province_customer,
                    "order_count" =>$order_count,
                    ]);

            }
            return $customer_product;
            $view = view('backend.pages.store.customer.getOrderCustomer',[
                    'customer_list'         => $customer_list,
            ]);
            $objdata['List'] = urlencode($view);
            if($objdata['List']){
                $objdata['Response'] = 'True';
            }
        }
        return $objdata;
    }
    public function CreateCustomer(Request $request)
    {
        $customer = new Customer ;
        $customer_meta = new CustomerMeta ;
        $provincesObject = new Provinces;
        $districtsObject = new Districts;
        $data = $request->all();
        $phone=isset($data['phone']) ? $data['phone'] : '';
        $fullname=isset($data['fullname']) ? $data['fullname'] : '';
        $email=isset($data['email']) ? $data['email'] : '';
        $address=isset($data['address']) ? $data['address'] : '';
        /*-- Validator --*/
        $validator = Validator::make($data,[
            'fullname' => 'max:40',
            'phone' => 'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/|between:8,11',
            'email' => 'email|unique:qm_customer,customer_email',
        ],[
            'fullname.max' => 'Tên không được quá 40 kí tự',
            'phone.regex' => 'Điện thoại không đúng, vui lòng nhập lại',
            'phone.between' => 'Số điện thoại phải từ 8 đến 11 số',
            'email.email' => 'Email không đúng, vui lòng nhập lại',
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email mới',
            
        ]);

        if( $validator->fails() )
        {
            if($request->ajax()){
                return '{"Response":"False","Message":"'.urlencode($validator->errors()).'"}';
            }
        }
        // Kiem tra 1 trong 3 truong co duoc nhap ko
        
        if( !$fullname && !$phone  && !$email ){
            $validator->getMessageBag()->add('','Bạn phải nhập ít nhất email, tên hoặc số điện thoại');
            if($request->ajax()){
                return '{"Response":"False","Message":"Bạn phải nhập ít nhất email, tên hoặc số điện thoại"}';
            }
        }
        // Check province
        $provinces = isset($data['provinces']) ? $data['provinces'] : 0;
        $get_provinces_id = $provincesObject->Get_provinces_id($provinces);
        if( $get_provinces_id == null )
        {
            $validator->getMessageBag()->add('provinces','Vui lòng chọn Tỉnh/Thành phố');
            if($request->ajax()){
                return '{"Response":"False","Message":"Vui lòng chọn Tỉnh/Thành phố"}';
            }
        }
        // Check district
        $districts = isset($data['districts']) ? $data['districts'] : 0;
        $check_district = $districtsObject->Check_district($districts,$provinces);
        if( $check_district == null )
        {
            $validator->getMessageBag()->add('districts','Vui lòng chọn Quận/Huyện');
            if($request->ajax()){
                return '{"Response":"False","Message":"Vui lòng chọn Quận/Huyện"}';
            }
        }

        /*-- End Validator --*/

        $email_advertising = isset($data['email_advertising'])? '1' : '0';
        //Thêm vào customer
        $customer_arr = [];
        $customer_arr['customer_fullname'] = $fullname;
        $customer_arr['customer_phone'] = $phone;
        $customer_arr['customer_email'] = $email;
        $customer_arr['email_advertising'] = $email_advertising;
        $customer_arr['customer_address'] = $address; 
        $customer_arr['customer_province'] = $provinces ; 
        $customer_arr['customer_district'] = $districts ;  
        $customer_id = $customer -> Insert_customer( $customer_arr );

        //Thêm vào customer meta
        $user_id = Session::get('user_id');
        $time = time();
        $customer_meta -> Insert_customer_meta($customer_id,'register_time', $time);
        if($user_id){
            $customer_meta -> Insert_customer_meta($customer_id,'register_by', $user_id);
        }
        $customer_new = $customer->Get_customer_id($customer_id);
        $district_customer = $districtsObject->get_district_name($customer_new->customer_district,$customer_new->customer_province);
        $province_customer = $provincesObject->get_province_name($customer_new->customer_province);
        $json = [
            "customer_id" => $customer_new->customer_id,
            "full_name" => $customer_new->customer_fullname,   
            "phone" => $customer_new->customer_phone,
            "address" => $customer_new->customer_address,
            "district_id" =>$customer_new->customer_district,
            "district_name" =>$district_customer,
            "province_id" =>$customer_new->customer_province,
            "province_name" =>$province_customer,
            "order_count" =>0
        ];
        
        return $json;


    }
    public function CreateProduct(Request $request)
    {
        $data = $request->all();
        $title=isset($data['title']) ? $data['title'] : '';
        $product_price=isset($data['product_price']) ? $data['product_price'] : '';
        $product=new Product;
        $variant=new Variant;
        $variant_meta=new VariantMeta;
        $validator = Validator::make($data,[
            'title'=>'required',
            'product_price'=>'required | numeric |min:1'

        ],[
            'title.required'=>'Chưa nhập tiêu đề',
            'product_price.required'=>'Chưa nhập giá',
            'product_price.numeric'=>'Giá phải là số',
            'product_price.min'=>'Giá phải lớn hơn 0',
        ]);

        if( $validator->fails() )
        {
            if($request->ajax()){
                return '{"Response":"False","Message":"'.urlencode($validator->errors()).'"}';
            }
        }
        $title = strip_tags(trim($title));

        /*-- Check Slug --*/
        //-----------------/
        if(strlen($title)==0){
            $slug = str_slug_product('create','no title');
        }else{
            $slug = str_slug_product('create',$title);
        }
        // /*-- End Check Slug --*/
        $dataproduct['product_slug'] = $slug;
        $dataproduct['user_id'] = Session::get('user_id');
        // //xử lý thời gian
        $time=time();
        $dataproduct['product_date'] = $time;
        $dataproduct['product_modified'] = $time;
        $dataproduct['product_status'] = 'public';
        $dataproduct['comment_status'] = 'yes';
        $product_id = $product->Insert_product($dataproduct);

        //Insert variant
        $datavariant['product_id'] = $product_id;
        $datavariant['price_new'] = $product_price;
        $datavariant['ship'] = 1;
        $variant_id= $variant->Insert_variant($datavariant);
        //END Insert variant
        //insert variant_meta 
        $variant_meta->Insert_variant_meta($variant_id,'Title','Default Title');
        //END insert variant_meta
        $json='';
        $product_new=$product->Get_product_id($product_id);
        $variant_new=$variant->Get_variant_id($variant_id);
        $variant_meta_new=$variant_meta->Get_variant_meta_id($variant_id);
        $product_name=$product_new->product_name;
        $variant_title='';
        $ship=$variant_new->ship;

        foreach ($variant_meta_new as $value) {
            $variant_title=$value->variant_value;
        }
        $json=[
        "product_id" => $product_id,
        "product_name" => $product_name,
        "product_image" => "",
            "product_variant" => [[
                "variant_id" => $variant_id,
                "variant_title" => $variant_title,
                "price_old" => "",
                "price_new" => $product_price,
                "variant_quantity" => "",
                "sku" => "",
                "barcode" => "",
                "ship" => $ship,
                "image" => "",
                "tracking_policy" => "",
                "out_of_stock" =>"",
            ]]
        ];
        return $json;
    }
    public function Customergroupdiscount(Request $request)
    {
        $discount = new Discount();
        $data=$request->all();
        $taxonomy_id = isset($data['taxonomy_id']) ? $data['taxonomy_id'] : '';
        $time = time();
        $customer_gr = $discount->get_group_customer_discount($time,$taxonomy_id);
        $data_list = [];
        $discount_arr = [];
        $taxonomy_id = '';
        $taxonomy_name = '';
        foreach ($customer_gr as $c) {
            $taxonomy_id = $c->taxonomy_id;
            $taxonomy_name = $c->taxonomy_name;
            $discount_take_max = $discount->max_group_customer_discount($c->taxonomy_id,$c->discount_option,$time);
            array_push($discount_arr, ["discount_take" => $discount_take_max,"discount_type" => $c->discount_option]);
        
            // $amount_max = $this->max_group_customer_discount($customer_gr->taxonomy_id,'amount',$time);
            // $percentage_max = $this->max_group_customer_discount($customer_gr->taxonomy_id,'percentage',$time);
            
        }
        array_push($data_list, [
            "taxonomy_id" => $taxonomy_id, 
            "taxonomy_name" => $taxonomy_name,
            "discount" => $discount_arr      
        ]);
        
        return json_encode($data_list,JSON_UNESCAPED_UNICODE);
    }
    public function Productgroupdiscount(Request $request)
    {
        $discount = new Discount();
        $data=$request->all();
        $taxonomy_id = isset($data['taxonomy_id']) ? $data['taxonomy_id'] : '';
        $time = time();
        $product_gr = $discount->get_group_product_discount($time,$taxonomy_id);
        $data_list = [];
        $discount_arr = [];
        $taxonomy_id = '';
        $taxonomy_name = '';
        foreach ($product_gr as $p) {
            $taxonomy_id = $p->taxonomy_id;
            $taxonomy_name = $p->taxonomy_name;
            $discount_take_max = $discount->max_group_product_discount($p->taxonomy_id,$p->discount_option,$time);
            array_push($discount_arr, ["discount_take" => $discount_take_max,"discount_type" => $p->discount_option]);
            
        }
        array_push($data_list, [
            "taxonomy_id" => $taxonomy_id, 
            "taxonomy_name" => $taxonomy_name,
            "discount" => $discount_arr      
        ]);
        
        return json_encode($data_list,JSON_UNESCAPED_UNICODE);
    }
    
    
}