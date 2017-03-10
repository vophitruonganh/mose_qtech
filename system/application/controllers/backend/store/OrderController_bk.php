<?php

namespace App\Http\Controllers\backend\store;

use Illuminate\Http\Request;

use App\Http\Requests;
//use App\Http\Controllers\BackendController;
use App\Http\Controllers\backend\BackendController;

/*
 * Use Library of Laravel
 */
use App\Models\Order;
use App\Models\Ordermeta;
use App\Models\Postmeta;
use App\Models\Post;
use Validator;
use DB;
use Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderController extends BackendController
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

        // return $_GET["order_status"];
        $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';
        $pageNo = $request->input('page',1);
        $data = $request->all();
        // return $data;
        $arr_button = ['search', 'action'];
         /*--check type submit*/
        $type_submit = 'search';
        if(isset($_GET["type_submit"]))
        {
            $type_submit = $_GET["type_submit"];
        }

        if(!in_array($type_submit, $arr_button))
        {
            //$type_submit = 'search';
            return redirect('admin/order');
        }

        /*--end check--*/
        if($type_submit == 'action')
        {
            $checks = [];
            $order_action = '';
            if(isset($_GET["order_action"])){
                $order_action = $_GET["order_action"];
            }
            if(isset($_GET["check"]))
            {
                $checks =$_GET["check"];
                return $this->postAction($checks,$order_action);

            }
            return redirect('admin/order');
        }

        if($type_submit == 'search')
        {

            $arr_order_status = ['all','0', '1','3'] ;

            /*--Post status--*/
            $order_status = 'all';
            if(isset($_GET["order_status"]))
            {
                $order_status = $_GET["order_status"];
            }

            /*--end post status--*/
            /*--search --*/
            $keyWord = isset($data['query']) ? $data['query'] : '';

            $query=strip_tags(trim($keyWord));
            /*--endsearch--*/
             /*--Đếm số đơn hàng mỗi loại-*/
            $count = [];
            $count['all']= $this->count_order_status('all');
            $count['paid'] = $this->count_order_status('0');
            $count['pending'] = $this->count_order_status('1');
            $count['draft'] = $this->count_order_status('3');

            /*--End--*/
            if(!in_array($order_status, $arr_order_status))
            {

                return redirect('admin/order');
            }
            else
            {

                if($order_status == 'all')
                {
                    if($user_id!=''){
                        $ordercodes = DB::table('qm_order')
                         ->where('user_id',$user_id)
                         ->where('order_code','like','%'.$query.'%')
                         ->where('order_status','<>','trash')
                         ->where('order_status','<>','2')
                         ->groupBy("order_code")
                         ->get();
                    }
                    else{
                        $ordercodes = DB::table('qm_order')
                         ->where('order_code','like','%'.$query.'%')
                         ->where('order_status','<>','trash')
                         ->where('order_status','<>','2')
                         ->groupBy("order_code")
                         ->get();
                    }

                }
                else
                {
                    if($user_id!=''){
                        $ordercodes = DB::table('qm_order')
                         ->where('user_id',$user_id)
                         ->where('order_code','like','%'.$query.'%')
                         ->where('order_status',$order_status)
                         ->groupBy("order_code")
                         ->get();
                    }
                    else{
                        $ordercodes = DB::table('qm_order')
                         ->where('order_code','like','%'.$query.'%')
                         ->where('order_status',$order_status)
                         ->groupBy("order_code")
                         ->get();
                    }


                }
                
            }
        }

        //danh sách hóa đơn
        // $test=$ordercodes=Order::select('user_id','order_code','order_date','order_status')->groupBy("order_code")->pagination();
        $arrOrder=[];//mảng lưu thông tin các hóa đơn
        foreach ($ordercodes as $data) {
            //chi tiết hóa đơn

            $orders=DB::table('qm_order')
            ->join('qm_user','qm_user.user_id','=','qm_order.user_id')
            ->join('qm_ordermeta','qm_order.order_id','=','qm_ordermeta.order_id')
            ->where('order_code','=',$data->order_code)
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
                'user_username' => $order->user_username,
                'order_status' => $data->order_status,
                'total' => $sum
            );
            array_push($arrOrder,$arr);
        }
       
        $list_order = $this->paginate($arrOrder, 10,$pageNo);  

        return view('backend.pages.store.order.listOrder',[
            'list_order' => $list_order,
            'count' => $count,
            'order_status' => $order_status,
            'search' => $query,
            'type_submit' => $type_submit
        ]);
    }
    private function count_order_status($order_status = '')
    {
        // $arr_page_status = array('all','public','pending','trash','draft');
        $arr_order_status = array('all',0,1,3);
        if(!in_array($order_status, $arr_order_status))
            return '0';
        if($order_status=='all'){
            return DB::table('qm_order')->where('order_status','<>','trash')->distinct("order_code")->count("order_code"); 
        }else {
            return DB::table('qm_order')->where('order_status',$order_status)->distinct("order_code")->count("order_code");
        }
    }

    private function postAction($checks,$post_action)
    {
        /*--Action--*/
         if(count($checks)==0)
         {
             return redirect('admin/order');
         }

         $arr_action = ['trash','edit'];
         if(!in_array($post_action, $arr_action))
         {
             return redirect('admin/order');
         }
         
         //Check checkbox
         $count = DB::table('qm_order')->whereIn('order_code',$checks)->distinct("order_code")->count("order_code");
         if( $count != count($checks))
         {
             return redirect('admin/order');
         }
         //End checkbox
         if($post_action == 'trash')
         {
            foreach ($checks as $check) 
            {
                DB::table('qm_order')->where('order_code',$check)->update(['order_status' => $post_action]);
            }
            return redirect('admin/order');
         }
         
         if($post_action == 'edit')
         {
            return redirect('admin/order/edit/'.$checks[0]);
         }
        /*--End action--*/
    }
    public function draft_order(Request $request)
    {
        $pageNo = $request->input('page',1);
        $ordercodes=Order::select('user_id','order_code','order_date','order_status')
        ->where('order_status','<>',0)
        ->groupBy("order_code")->get();
        $arrOrder=[];
        foreach ($ordercodes as $data) {
            $orders=DB::table('qm_order')
            ->join('qm_postmeta','qm_order.post_id','=','qm_postmeta.post_id')
            ->join('qm_ordermeta','qm_order.order_id','=','qm_ordermeta.order_id')
            ->where('order_code','=',$data->order_code)
            ->get();
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
    
    public function order_list($order_status,Request $request)
    {
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
        $ordercodes=Order::select('user_id','order_code','order_date','order_status')
        ->where('order_status','=',$status)
        ->groupBy("order_code")->get();
        $arrOrder=[];
        foreach ($ordercodes as $data) {
            $orders=DB::table('qm_order')
            ->join('qm_postmeta','qm_order.post_id','=','qm_postmeta.post_id')
            ->join('qm_ordermeta','qm_order.order_id','=','qm_ordermeta.order_id')
            ->where('order_code','=',$data->order_code)
            ->get();
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
        $_order=Order::groupBy('order_code')->get();
        $_max_order=Order::max('order_code');
        $order_code=0;
        //kiểm tra table order
        //mã hóa đơn bắt đầu từ 1000
        if(count($_order)==0){
            $order_code=1000;
        }
        else{
            $order_code= $_max_order+1;
        }

        return view('backend.pages.store.order.create',[
           'order_code'=>$order_code
        ]);
    }
    //danh sách sản phẩm
    public function ListProduct()
    {
        $terms=DB::table('qm_term')->join('qm_termmeta','qm_term.term_id','=','qm_termmeta.term_id')
                                    ->where('term_type','product_promotion')
                                    ->where('qm_termmeta.meta_key','product_discount')
                                    ->get();

        $posts = DB::table('qm_post')
        ->join('qm_postmeta','qm_post.post_id','=','qm_postmeta.post_id')
        ->where('post_type','product')->get();

        

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
                        if($termvalue["dv_value"]==$product->post_id){
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
                'name'         => $product->post_title,
                'price'        => intval($price_new),
                'post_id'      => $product->post_id,
                
            );
            array_push($arrPosts,$arr);

        }

        return $arrPosts;
    }
    //danh sách sản phẩm khách hàng đặt mua theo mã hóa đơn
    public function ListProductUpdate($ordercode)
    {
        $orders=DB::table('qm_order')
            ->select("qm_ordermeta.om_value")
            ->join('qm_post','qm_order.post_id','=','qm_post.post_id')
            ->join('qm_ordermeta','qm_order.order_id','=','qm_ordermeta.order_id')
            ->where('qm_order.order_code','=',$ordercode)
            ->get();
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
    
    public function store(Request $request)
    {
        $data = $request->all();
        $datajson=json_decode($data["data"]);
        foreach ($datajson as $data) {
            $order=new Order;
            $order->order_code=$data->order_code;  
            $order->user_id=Session::get('user_id');
            $order->post_id=$data->post_id;
            $order->order_ems='1';
            $order->order_content=$data->order_content;
            $order->order_payment=0;
            $order->order_status=$data->order_status;
            $order->order_ship=0;
            //xử lý thời gian
            $time=time();
            $order->order_date=$time;
            $order->save();

            $post_id=$order->max('order_id');
                
            //Thêm  order meta

            $dataOrder=[];
            $dataOrder[$data->post_id]['sub_total']= $data->sub_total;
            $dataOrder[$data->post_id]['quantity']= $data->quantity;
            // $dataOrder['sub_total']= $data->sub_total;
            // $dataOrder['quantity']= $data->quantity;
            $order_meta= new Ordermeta;
            $order_meta->order_id=$post_id;
            $order_meta->om_key='order_detail';
            $order_meta->om_value=encode_serialize($dataOrder);
            $order_meta->save();
            unset($dataOrder);
            
        }
		
		/*
         * ADD DATABASE LOG
         */
        addTableLog("App\Models\Logs", Session::get('user_id'), 'order', __FUNCTION__, "0,0,$order->order_code");
        /* END SAVE DATABASE LOG */
		
        return "Insert Success";
        
    }
    
    public function edit($ordercode)
    {   
        $order=Order::where('order_code',$ordercode)->first();

        if(count($order)==0)
        {
            return redirect('admin/order');
        }
        //nếu là đã thanh toán thì cho xem chi tiết hóa đơn (order_status=1)
        //nếu là chưa thanh toán hoặc lưu nháp thì cho phép chỉnh sửa (order_status=0 or order_status=2)
        if($order->order_status==0){
            $orders=DB::table('qm_order')
            ->join('qm_postmeta','qm_order.post_id','=','qm_postmeta.post_id')
            ->join('qm_ordermeta','qm_order.order_id','=','qm_ordermeta.order_id')
            ->join('qm_post','qm_order.post_id','=','qm_post.post_id')
            ->where('order_code','=',$ordercode)
            ->get();
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
        $orders=Order::where("order_code",$ordercode)->get();
        foreach ($orders as $order) {
            Ordermeta::where("order_id","=",$order->order_id)->delete();
        }
        Order::where("order_code",$ordercode)->delete();
        $data = $request->all();
        $datajson=json_decode($data["data"]);
        // return $datajson;
        foreach ($datajson as $data) {
            $order=new Order;
            $order->order_code=$ordercode;
            $order->user_id=Session::get('user_id');
            $order->post_id=$data->post_id;
            $order->order_ems='1';
            $order->order_content=$data->order_content;
            $order->order_payment=0;
            $order->order_status=$data->order_status;
            $order->order_ship=0;
            //xử lý thời gian
            $time=time();
            $order->order_date=$time;
            $order->save();

            $post_id=$order->max('order_id');
                
            //Thêm  order meta
            
            $dataOrder=[];
            $dataOrder[$data->post_id]['sub_total']= $data->sub_total;
            $dataOrder[$data->post_id]['quantity']= $data->quantity;
            // $dataOrder['sub_total']= $data->sub_total;
            // $dataOrder['quantity']= $data->quantity;
            $order_meta= new Ordermeta;
            $order_meta->order_id=$post_id;
            $order_meta->om_key='order_detail';
            $order_meta->om_value=encode_serialize($dataOrder);
            $order_meta->save();
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
        $orders=Order::where("order_code",$ordercode)->get();
        foreach ($orders as $order) {
             Ordermeta::where("order_id","=",$order->order_id)->delete();
         }
         Order::where("order_code",$ordercode)->delete();
		
		/*
          * ADD DATABASE LOG
          */
         addTableLog("App\Models\Logs", Session::get('user_id'), 'order', __FUNCTION__, "0,0,$ordercode");
         /* END SAVE DATABASE LOG */
		
        return redirect('admin/order');
    }



//===============================================PENDING=======================================================
    private function getTerms(){
        $terms=DB::table('qm_term')
                                ->join('qm_termmeta','qm_term.term_id','=','qm_termmeta.term_id')
                                ->where('term_type','product_promotion')
                                ->where('qm_termmeta.meta_key','product_discount')
                                ->get();
        return $terms;
    }

    private function discount($product,$terms){
        $arrProduct = [];
        if(!empty($terms)){
            $today = time();
            $percent_discount=0;
            $percent_temp=0;
            $vnd_discount=0;
            $price=0;
            $value = decode_serialize($product->meta_value);
            $groupProducts=DB::table('qm_term')->join('qm_term_relationships','qm_term_relationships.term_id','=','qm_term.term_id')->where('term_type','group_product')->get();

            foreach($terms as $term){
                $termmeta=decode_serialize($term->meta_value);

                //check discount
                if($termmeta["discount_promotion"]==2 && $termmeta["dv_count"]==1 && $termmeta["discount_active"]==1){
                    if(($termmeta["date_limit"]=="true") || ($termmeta["date_limit"]=="false" && $termmeta["date_end"]>=$today)){
                        if($termmeta["discount_offer"]==3 ){
                            foreach ($groupProducts as $groupProduct) {
                                if($product->post_id==$groupProduct->post_id){
                                    if($termmeta['dv_value']==$groupProduct->term_id){
                                        if($termmeta['discount_type']==1){
                                            $vnd_discount = $termmeta["discount_take"];
                                            if($vnd_discount > $price){
                                                $price = $value['price_new'] - $termmeta["discount_take"];
                                            }
                                        }
                                        if($termmeta['discount_type']==2){
                                            $percent_temp=$termmeta["discount_take"];
                                            if($percent_temp > $percent_discount){
                                                $price=$value['price_new'] * (1 - $percent_temp/100);
                                                $percent_discount=$percent_temp;
                                            }
                                        }
                        
                                    }
                                }
                            }
                        }
                        if($termmeta["discount_offer"]==4 ){
                            if($termmeta['dv_value']== $product->post_id){
                                if($termmeta['discount_type']==1){
                                    $vnd_discount_temp = $termmeta["discount_take"];
                                    if($vnd_discount_temp > $vnd_discount){
                                        $vnd_discount = $vnd_discount_temp;
                                        // $price = $post['price_new'] - $termmeta["discount_take"];
                                    }
                                }
                                if($termmeta['discount_type']==2){
                                    $percent_temp=$termmeta["discount_take"];
                                    if($percent_temp > $percent_discount){
                                        // $price=$post['price_new'] * (1 - $percent_temp/100);
                                        $percent_discount=$percent_temp;
                                    }
                                    
                                }

                            }
                                
                        }
                    }
                }
                //end check discount
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
                $arrProduct=array(
                    'post_id'       => $product->post_id,
                    'post_title'    => $product->post_title,
                    'price'         => $price, 
                    );
            }else{
                $arrProduct=array(
                    'post_id'        => $product->post_id,
                    'post_title'     => $product->post_title,
                    'price'           => $value['price_new'],
                );
                
            }
        }

        return $arrProduct;
    }

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
        $order=Order::where('order_code',$orderCode)->first();

        if(count($order)==0)
        {
            return redirect('admin/order/pending');
        }

        return view('backend.pages.store.order.edit_pending',[
            'order' => $order,
        ]);
    }
    
    public function orderPendingUpdate($orderCode,Request $request){
		$orders=Order::where("order_code",$orderCode)->get();
        foreach ($orders as $order) {
            Ordermeta::where("order_id","=",$order->order_id)->delete();
        }
        Order::where("order_code",$orderCode)->delete();
        $data = $request->all();

        $datajson=json_decode($data["data"]);  

        foreach ($datajson as $data) {
            $order=new Order;
            $order->order_code=$orderCode;
            $order->user_id=Session::get('user_id');
            $order->post_id=$data->post_id;
            $order->order_ems='1';
            $order->order_content=null;
            $order->order_payment=0;
            $order->order_status=$data->order_status;
            $order->order_ship=0;
            $order->order_date=time();
            $order->save();

            $post_id=$order->max('order_id');
                
            //Thêm  order meta
            $dataOrder[$data->post_id]['sub_total']= $data->sub_total;
            $dataOrder[$data->post_id]['quantity']= $data->quantity;
            $order_meta= new Ordermeta;
            $order_meta->order_id=$post_id;
            $order_meta->om_key='order_detail';
            $order_meta->om_value=encode_serialize($dataOrder);
            $order_meta->save();
            unset($dataOrder);
        }

    }
    
    public function orderPendingDelete($ordercode)
    {
        $orders=Order::where("order_code",$ordercode)->get();
        foreach ($orders as $order) {
            Ordermeta::where("order_id","=",$order->order_id)->delete();
        }
        Order::where("order_code",$ordercode)->delete();
    
        return redirect('admin/order/pending');
    }
    public function printorder($ordercode){
        $order=Order::where('order_code',$ordercode)->first();

        if(count($order)==0)
        {
            return '';
        }
        $orders=DB::table('qm_order')
            ->join('qm_postmeta','qm_order.post_id','=','qm_postmeta.post_id')
            ->join('qm_ordermeta','qm_order.order_id','=','qm_ordermeta.order_id')
            ->join('qm_post','qm_order.post_id','=','qm_post.post_id')
            ->where('order_code','=',$ordercode)
            ->get();
        return view('backend.pages.store.order.print',[
            'order' => $order,
            'orders' => $orders
        ]);
    }
}