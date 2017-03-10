<?php

namespace App\Http\Controllers\backend\store;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;

/*
 * Use Library of Laravel
 */
use App\Models\Discount;
use App\Models\Taxonomy;
use App\Models\Product;
use Validator;

class DiscountController extends BackendController
{
	public function index(Request $request)
	{
		$data = $request->all();

		$taxonomyObject = new Taxonomy;
		$productObject = new Product;
		$time = time();
		
		$actionStatus = $request->input('discount_status','all');
		$select_action = isset($data['select_action']) ? $data['select_action'] : '';
		$check = isset($data['check']) ? $data['check'] : [];
		$search = $request->input('search');
		$discountCount = [];
		$discountCount['all'] = $this->discountCount('all');
		$discountCount['activated'] = $this->discountCount('activated');
		$discountCount['not_activated'] = $this->discountCount('not_activated');
		$discountCount['waiting'] = $this->discountCount('waiting');
		$discountCount['expired'] = $this->discountCount('expired');
		$AllowActionStatus = ['all','active','deactive','waiting','expired'];

		if( !in_array($actionStatus,$AllowActionStatus) )
		{
			return redirect('admin/discount');
		}

		$type_request = '';
		if( $request->isMethod('post') && $request->ajax())
		{
			$type_request = 'ajax';
		}

		$discounts = [];
		switch( $actionStatus )
		{
			case 'all':
				$discounts = Discount::orderBy('discount_id','desc')->where('discount_title','like','%'.$search.'%')->paginate(30);
				break;
			case 'active':
				$discounts = Discount::where('discount_date_start','<=',$time)
					->where(function($query) use ($time){
						$query->where('discount_date_end','>=',$time)
						->orWhere('discount_date_end','<=',0);
					})->where('discount_title','like','%'.$search.'%')->paginate(30);
				break;
			case 'deactive':
				$discounts = Discount::where(function($query) use ($time){
						$query->where('discount_date_end','>',0)
						->where('discount_date_start','>',$time);
					})->orWhere(function($query) use ($time){
						$query->where('discount_date_end','<=',0)
						->where('discount_date_start','>',$time);
					})->where('discount_title','like','%'.$search.'%')->paginate(30);
				break;
			case 'waiting':
				$discounts = Discount::where('discount_status',0)->where('discount_title','like','%'.$search.'%')->paginate(30);
				break;
			case 'expired':
			default:
				$discounts = Discount::where('discount_date_end','>',0)
					->where('discount_date_end','<',$time)->where('discount_title','like','%'.$search.'%')->paginate(30);
		}

		if($type_request == 'ajax')
		{
			if( $select_action == 'active' )
			{
				foreach( $check as $v )
				{
					$this->discountActive($v);
				}
				return '{"Response":"True","Redirect":"'.url('admin/discount').'"}';
			}

			if( $select_action == 'deactive' )
			{
				foreach( $check as $v )
				{
					$this->discountDeactive($v);
				}
				return '{"Response":"True","Redirect":"'.url('admin/discount').'"}';
			}

			if( $select_action == 'trash' )
			{
				foreach( $check as $v )
				{
					$this->discountDelete($v);
				}
				return '{"Response":"True","Redirect":"'.url('admin/discount').'"}';
			}

			$data_view = [];
			$data_view['discountCount'] = $discountCount;
			$data_view['actionStatus'] = $actionStatus;
			$data_view['search'] = $search;
			$data_view['time'] = $time;
			return $this->discountView($discounts,$data_view);

		}
		else
		{
			$data_page['discount_status'] = $actionStatus;
			return view('backend.pages.store.discount.listDiscount',[
				'discounts' => $discounts,
				'discountCount' => $discountCount,
				'actionStatus' => $actionStatus,
				'search' => $search,
				'time' => $time,
				'pagination' => $data_page,
			]);
		}
	}

	public function discountView($discounts,$data_view = array())
	{
		$objdata = Array('Response'=>'False','Page'=>'','List'=>'');
		$view = view('backend.pages.store.discount.listViewDiscount',[
			'discounts'         => $discounts,
			'discountCount'        => $data_view['discountCount'],
			'actionStatus'   => $data_view['actionStatus'],
			'search'       => $data_view['search'],
			'time'        => $data_view['time']
		]);
		$objdata['Page'] = urlencode($discounts->render());

		if($data_view['search'])
		{
			$objdata['Page'] = urlencode($discounts->appends([
				'discount_status' => $data_view['actionStatus'],
			])->render());
		}

		$objdata['List'] = urlencode($view);
		if($objdata['List'])
		{
			$objdata['Response'] = 'True';
		}
		return $objdata;
	}

	public function detail(Request $request)
	{
		$taxonomyObject = new Taxonomy;
		$productObject = new Product;

		$data = $request->all();

		$discountId = $data['discount_id'];

		$discount = Discount::where('discount_id',$discountId)->first();
		if( $discount == null )
		{
			return;
		}

		$relationshipName = $discount->relationship_title;
		$relationshipUrl = '';
		switch( $discount->discount_offer )
		{
			case 3:
				if( strlen($relationshipName) == 0 )
				{
					$groupProduct = $taxonomyObject->Get_taxonomy_id('product_group',$discount->relationship_id);
					$relationshipName = $groupProduct->taxonomy_name;
					$relationshipUrl = url('admin/taxonomy/product-group/edit/'.$groupProduct->taxonomy_id);
				}
				break;
			case 4:
				if( strlen($relationshipName) == 0 )
				{
					$product = $productObject->Get_product_id($discount->relationship_id);
					$relationshipName = $product->product_title;
					$relationshipUrl = url('admin/product/edit/'.$product->product_id);
				}
				break;
			case 5:
				if( strlen($relationshipName) == 0 )
				{
					$groupCustomer = $taxonomyObject->Get_taxonomy_id('customer_group',$discount->relationship_id);
					$relationshipName = $groupCustomer->taxonomy_name;
					$relationshipUrl = url('admin/taxonomy/customer-group/edit/'.$groupCustomer->taxonomy_id);
				}
				break;
		}

		$dataList = [
			'discount_type' => $discount->discount_type,
			'discount_offer' => $discount->discount_offer,
			'relationship_name' => $relationshipName,
			'relationship_url' => $relationshipUrl,
			'offer_option' => $discount->offer_option,
			'money_over' => $discount->money_over,
		];

		return json_encode($dataList,JSON_UNESCAPED_UNICODE);
	}

	public function create()
	{
		return view('backend.pages.store.discount.createDiscount');
	}

	public function store(Request $request)
	{
		$taxonomyObject = new Taxonomy;
		$productObject = new Product;

		$data = $request->all();
		
		// Validator
		$validator = Validator::make($data,[
			'discount_title' => 'required',
			'discount_take' => 'required',
		],[
			'discount_title.required'=>'Tên mã khuyến mãi không được để trống',
			'discount_take.required'=>'Đơn vị giảm không được để trống',
		]);

		if( $validator->fails() )
		{
			return redirect('admin/discount/create')->withErrors($validator)->withInput();
		}
		// End

		// Get Data
		$discountType = isset($data['discount_type']) ? $data['discount_type'] : 1;
		$discountTitle = isset($data['discount_title']) ? $data['discount_title'] : '';
		$discountPromotionAllow = isset($data['promotion_allow']) ? 1 : 0;
		$discountLimit = isset($data['limit']) ? 1 : 0;
		if( $discountLimit ) $discountLimitStart = 0;
		else $discountLimitStart = isset($data['discount_limit']) ? intval($data['discount_limit']) : '';
		$discountOption = isset($data['discount_option']) ? $data['discount_option'] : 'amount';
		$discountTake = intval(str_replace(',','',$data['discount_take']));
		$discountOffer = isset($data['discount_offer']) ? $data['discount_offer'] : 'all';
		$discountMoneyOver = isset($data['money']) ? intval(str_replace(',','',$data['money'])) : 0;
		$productGroupId = isset($data['product_group_id']) ? intval($data['product_group_id']) : 0;
		$productId = isset($data['product_id']) ? intval($data['product_id']) : 0;
		$customerGroupId = isset($data['customer_group_id']) ? intval($data['customer_group_id']) : 0;
		$offerOption1 = isset($data['offer_option_1']) ? $data['offer_option_1'] : 'per_order';
		$offerOption2 = isset($data['offer_option_2']) ? intval($data['offer_option_2']) : 1;
		$discountStartDate = isset($data['start_date']) ? $data['start_date'] : '';
		$dateLimit = isset($data['date_limit']) ? 1 : 0;
		if( $dateLimit ) $discountEndDate = '';
		else $discountEndDate = isset($data['end_date']) ? $data['end_date'] : '';;
		// End

		// Validate Discount Type
		$allowDiscountType = [1,2];
		if( !in_array($discountType,$allowDiscountType) )
		{
			$validator->getMessageBag()->add('discount_type','Vui lòng chọn loại khuyến mãi');
			return redirect('admin/discount/create')->withErrors($validator)->withInput();
		}
		// End

		// Validate Discount Title
		if( strlen($discountTitle) == 0 )
		{
			$validator->getMessageBag()->add('discount_title','Vui lòng nhập tên khuyến mãi');
			return redirect('admin/discount/create')->withErrors($validator)->withInput();
		}
		if( $discountType == 1 )
		{
			$countDiscounts = Discount::where('discount_type',1)->where('discount_title',$discountTitle)->count();
			if( $countDiscounts > 0 )
			{
				$validator->getMessageBag()->add('discount_title','Mã khuyến mãi đã tồn tại');
				return redirect('admin/discount/create')->withErrors($validator)->withInput();
			}
		}
		// End

		// Validate Discount Promotion Allow
		if( strlen($discountTitle) == 0 )
		{
			$validator->getMessageBag()->add('discount_title','Vui lòng nhập tên khuyến mãi');
			return redirect('admin/discount/create')->withErrors($validator)->withInput();
		}
		// End

		// Validate Discount Limit Start
		if( strlen($discountLimitStart) == 0 )
		{
			$validator->getMessageBag()->add('discount_limit','Vui lòng nhập số lần sử dụng');
			return redirect('admin/discount/create')->withErrors($validator)->withInput();
		}
		elseif( $discountLimitStart < 0 )
		{
			$validator->getMessageBag()->add('discount_limit','Số lần sử dụng phải >= 0');
			return redirect('admin/discount/create')->withErrors($validator)->withInput();
		}
		// End

		// Validate Discount Option
		$allowDiscountOption = [
			'amount',
			'percentage',
		];
		if( !in_array($discountOption,$allowDiscountOption) )
		{
			$validator->getMessageBag()->add('discount_option','Vui lòng chọn đơn vị khuyến mãi');
			return redirect('admin/discount/create')->withErrors($validator)->withInput();
		}
		// End

		// Validate Discount Take
		if( $discountTake <= 0 )
		{
			$validator->getMessageBag()->add('discount_take','Đơn giá khuyến mãi phải > 0');
			return redirect('admin/discount/create')->withErrors($validator)->withInput();
		}
		if( $discountOption == 'percentage' && $discountTake > 100 )
		{
			$validator->getMessageBag()->add('discount_take','Đơn giá khuyến mãi không lớn hơn 100%');
			return redirect('admin/discount/create')->withErrors($validator)->withInput();
		}
		// End

		// Validate Discount Offer
		$allowDiscountOffer = [
			'all',
			'amount_order',
			'product_group',
			'product',
			'customer_group',
		];
		if( !in_array($discountOffer,$allowDiscountOffer) )
		{
			$validator->getMessageBag()->add('discount_option','Vui lòng chọn loại áp dụng');
			return redirect('admin/discount/create')->withErrors($validator)->withInput();
		}
		// End

		// Validate Discount Money Over
		if( $discountOffer == 'amount_order' && $discountMoneyOver <= 0 )
		{
			$validator->getMessageBag()->add('money','Giá trị đơn hàng phải > 0');
			return redirect('admin/discount/create')->withErrors($validator)->withInput();
		}
		// End

		// Validate Group Product
		if( $discountOffer == 'product_group' )
		{
			$groupProduct = $taxonomyObject->Get_taxonomy_id('product_group',$productGroupId);
			if( !$groupProduct )
			{
				$validator->getMessageBag()->add('product_group_id','Vui lòng chọn nhóm sản phẩm');
				return redirect('admin/discount/create')->withErrors($validator)->withInput();
			}
		}
		// End

		// Validate Product
		if( $discountOffer == 'product' )
		{
			$product = $productObject->Get_product_id($productId);
			if( !$product )
			{
				$validator->getMessageBag()->add('product_id','Vui lòng chọn sản phẩm');
				return redirect('admin/discount/create')->withErrors($validator)->withInput();
			}
		}
		// End

		// Validate Group Customer
		if( $discountOffer == 'customer_group' )
		{
			$groupCustomer = $taxonomyObject->Get_taxonomy_id('customer_group',$customerGroupId);
			if( !$groupCustomer )
			{
				$validator->getMessageBag()->add('customer_group_id','Vui lòng chọn nhóm khách hàng');
				return redirect('admin/discount/create')->withErrors($validator)->withInput();
			}
		}
		// End

		// Validate Offer Option 1
		$allowOfferOption1 = [
			'per_order',
			'per_every_item',
		];
		if( !in_array($offerOption1,$allowOfferOption1) )
		{
			$validator->getMessageBag()->add('offer_option_1','Vui lòng chọn hình thức khuyến mãi');
			return redirect('admin/discount/create')->withErrors($validator)->withInput();
		}
		// End

		// Validate Offer Option 2
		//if( $discountType == 2 && $offerOption2 <= 0 )
		//{
			//$validator->getMessageBag()->add('offer_option_2','Số lượng sản phẩm áp dụng phải > 0');
			//return redirect('admin/discount/create')->withErrors($validator)->withInput();
		//}
		// End

		// Validate Discount End Date
		//- Start Date
		$arrDate = explode(' ',$discountStartDate);
		$arrDay = explode('/',$arrDate[1]);
		$startDate = strtotime(date($arrDay[2].'/'.$arrDay[1].'/'.$arrDay[0].' '.$arrDate[0]));
		//- End
		//- End Date
		$endDate = '';
		if( strlen($discountEndDate) > 0 )
		{
			$arrDate = explode(' ',$discountEndDate);
			$arrDay = explode('/',$arrDate[1]);
			$endDate = strtotime(date($arrDay[2].'/'.$arrDay[1].'/'.$arrDay[0].' '.$arrDate[0]));

			if( $endDate <= $startDate )
			{
				$validator->getMessageBag()->add('end_date','Ngày kết thúc phải lớn hơn ngày bắt đầu');
				return redirect('admin/discount/create')->withErrors($validator)->withInput();
			}
		}
		//- End
		// End

		// Discount Offer Value
		switch( $discountOffer )
		{
			case 'amount_order':
				$discountOffer = 2;
				break;
			case 'product_group':
				$discountOffer = 3;
				break;
			case 'product':
				$discountOffer = 4;
				break;
			case 'customer_group':
				$discountOffer = 5;
				break;
			case 'all':
			default:
				$discountOffer = 1;
		}
		// End

		// Discount Offer Option 1
		switch( $offerOption1 )
		{
			case 'per_order':
				$offerOption1 = 1;
				break;
			case 'per_every_item':
			default:
				$offerOption1 = 2;
		}
		// End

		// Set Default Variable With Discount Type = 1
		$offerOption = 0;
		$promotionAllow = 0;
		$moneyOver = 0;
		$relationshipId = 0;
		if( $discountType == 1 )
		{
			if( $discountOffer == 3 || $discountOffer == 4 ) $offerOption = $offerOption1;
			$promotionAllow = $discountPromotionAllow;
		}
		else // Discount Type == 2
		{
			$offerOption = $offerOption2;
		}
		if( $discountOffer == 2 ) $moneyOver = $discountMoneyOver;
		if( $discountOffer == 3 ) $relationshipId = $productGroupId;
		if( $discountOffer == 4 ) $relationshipId = $productId;
		if( $discountOffer == 5 ) $relationshipId = $customerGroupId;

		$dataInsert = [];
		$dataInsert = [
			'discount_title' => $discountTitle,
			'discount_limit_start' => $discountLimitStart,
			'discount_limit_end' => 0,
			'discount_date_start' => $startDate,
			'discount_date_end' => $endDate,
			'discount_status' => 1,
			'offer_option' => $offerOption,
			'promotion_allow' => $promotionAllow,
			'discount_option' => $discountOption,
			'discount_take' => $discountTake,
			'discount_offer' => $discountOffer,
			'money_over' => $moneyOver,
			'discount_type' => $discountType,
			'relationship_id' => $relationshipId,
			'relationship_title' => '',
		];
		Discount::insert($dataInsert);

		return redirect('admin/discount');
	}

	public function generateCodeDiscount()
	{
		$countDiscounts = 1;
		while( $countDiscounts > 0 )
		{
			$discountTitle = strtoupper(str_random(12));
			$countDiscounts = Discount::where('discount_type',1)->where('discount_title',$discountTitle)->count();
		}

		return $discountTitle;
	}

	private function discountCount($status)
	{
		$time = time();
		$count = 0;
		switch($status)
		{
			case 'activated':
				$count = Discount::where(function($query) use ($time){
						$query->where('discount_date_end','>',0)
						->where('discount_date_start','<=',$time)
						->where('discount_date_end','>=',$time);
					})->orWhere(function($query) use ($time){
						$query->where('discount_date_end','<=',0)
						->where('discount_date_start','<=',$time);
					})->count();
				break;
			case 'not_activated':
				$count = Discount::where(function($query) use ($time){
						$query->where('discount_date_end','>',0)
						->where('discount_date_start','>',$time);
					})->orWhere(function($query) use ($time){
						$query->where('discount_date_end','<=',0)
						->where('discount_date_start','>',$time);
					})->count();
				break;
			case 'expired':
				$count = Discount::where('discount_date_end','>',0)
					->where('discount_date_end','<',$time)->count();
				break;
			case 'waiting':
				$count = Discount::where('discount_status',0)->count();
				break;
			case 'all':
			default:
				$count = Discount::count();
		}

		return $count;
	}

	public function GetOfferList(Request $request)
	{
		$productObject = new Product;
		$taxonomyObject = new Taxonomy;

		$type = $request->input('offer_type','');
		$search = $request->input('search','');

		if( strlen($type) > 0 )
		{
			$dataList = [];

			if( $type == 'product' )
			{
				$data = $productObject->Search_product_title($search,5);

				foreach( $data as $row )
				{
					$dataList[] = [
						'id' => $row->product_id,
						'text' => $row->product_title,
					];
				}
			}

			if( $type == 'product_group' || $type == 'customer_group' )
			{
				$data = $taxonomyObject->Search_taxonomy_title_limit($type,$search,5);

				foreach( $data as $row )
				{
					$dataList[] = [
						'id' => $row->taxonomy_id,
						'text' => $row->taxonomy_name,
					];
				}
			}

			return json_encode($dataList,JSON_UNESCAPED_UNICODE);
		}

		return;
	}

	private function discountActive($id)
	{
		Discount::where('discount_id',$id)->update([
			'discount_status' => 1,
		]);
	}

	private function discountDeactive($id)
	{
		Discount::where('discount_id',$id)->update([
			'discount_status' => 0,
		]);
	}

	private function discountDelete($id)
	{
		Discount::where('discount_id',$id)->delete();
	}
}