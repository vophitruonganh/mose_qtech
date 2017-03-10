@extends('frontend.shop.layouts.default')
@section('content')

<?php 
   $xhtml = '';
   $xhtmlCart = '';
   $total = 0; 
   $order_cart = decode_serialize (Cookie::get('cart'));
   if($order_cart){
      $xhtml .= '<thead>
                  <tr>
                    <th>Image</th>
                    <th>Dtails </th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>';
      foreach($order_cart as $cart)
      {
           $total_price = $cart['price'] * $cart['quantity'];
           $total      += $total_price;
           $xhtml .= '           
                  <tr>
                    <td>
                      <img src="'.set_image_size(get_image_url($cart['variant_image']),'thumb').'" alt="'.$cart['product_title'].'">
                    </td>
                    <td>
                      <div class="shop-details">
                        <div class="productname">'.$cart['product_title'].'</div>
                        <p>'.$cart['variant_meta'].'</p>';
            if($cart['product_code']){
            $xhtml .=  '<p>
                          Product Code : 
                          <strong class="pcode">'.$cart['product_code'].'</strong>
                        </p>';
            }
            $xhtml .= '</div>
                    </td>
                    <td>
                      <h5>'.number_format($cart['price'], 0, ',', '.').'đ</h5>
                    </td>
                    <td>
                      <input type="number" maxlength="12" min="0" class="input-text qty" title="Số lượng" size="4" value="'.$cart['quantity'].'" name="quantity['.$cart['variant_id'].']" id="updates_653826" ">
                    </td>
                    <td>
                      <h5>
                        <strong class="red">'.number_format($total_price, 0, ',', '.').'đ</strong>
                      </h5>
                    </td>
                    <td>
                      <a onclick="deletePerItem('.$cart['variant_id'].')">
                        <img src="'.asset('template/shop/asset/images/remove.png').'" alt="">
                      </a>
                    </td>
                  </tr>';
      }
      $xhtml .='</tbody>
                <tfoot>
                  <tr>
                    <td colspan="6">
                      <button class="pull-left" onclick="window.location.href='."'".url('/collections')."'".'" type="button">
                        Continue Shopping
                      </button>
                      <button class=" pull-right">
                        Update Shopping Cart
                      </button>
                    </td>
                  </tr>
                </tfoot>';
   }else{
      $xhtml.='Bạn chưa có sản phẩm nào trong giỏ hàng';
   }
 ?>
        <div class="page-index">
          <div class="container">
            <p>
              Home - Shopping Cart
            </p>
          </div>
        </div>
      </div>
      <div class="clearfix">
      </div>
      <div class="container_fullwidth">
        <div class="container shopping-cart">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title">
                Shopping Cart
              </h3>
              <div class="clearfix">
              </div>
              <form action="{{ url('cart') }}" method="post" novalidate="">
                <input id="page_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
              <table class="shop-table">
                {!! $xhtml!!}
                
              
              </table>
              </form>
              <div class="clearfix">
              </div>
              <div class="row" style="display: none">
                <div class="col-md-4 col-sm-6">
                  <div class="shippingbox">
                    <h5>
                      Estimate Shipping And Tax
                    </h5>
                    <form>
                      <label>
                        Select Country *
                      </label>
                      <select class="">
                        <option value="AL">
                          Alabama
                        </option>
                        <option value="AK">
                          Alaska
                        </option>
                        <option value="AZ">
                          Arizona
                        </option>
                        <option value="AR">
                          Arkansas
                        </option>
                        <option value="CA">
                          California
                        </option>
                        <option value="CO">
                          Colorado
                        </option>
                        <option value="CT">
                          Connecticut
                        </option>
                        <option value="DE">
                          Delaware
                        </option>
                        <option value="DC">
                          District Of Columbia
                        </option>
                        <option value="FL">
                          Florida
                        </option>
                        <option value="GA">
                          Georgia
                        </option>
                        <option value="HI">
                          Hawaii
                        </option>
                        <option value="ID">
                          Idaho
                        </option>
                        <option selected="" value="IL">
                          Illinois
                        </option>
                        <option value="IN">
                          Indiana
                        </option>
                        <option value="IA">
                          Iowa
                        </option>
                        <option value="KS">
                          Kansas
                        </option>
                        <option value="KY">
                          Kentucky
                        </option>
                        <option value="LA">
                          Louisiana
                        </option>
                        <option value="ME">
                          Maine
                        </option>
                        <option value="MD">
                          Maryland
                        </option>
                        <option value="MA">
                          Massachusetts
                        </option>
                        <option value="MI">
                          Michigan
                        </option>
                        <option value="MN">
                          Minnesota
                        </option>
                        <option value="MS">
                          Mississippi
                        </option>
                        <option value="MO">
                          Missouri
                        </option>
                        <option value="MT">
                          Montana
                        </option>
                        <option value="NE">
                          Nebraska
                        </option>
                        <option value="NV">
                          Nevada
                        </option>
                        <option value="NH">
                          New Hampshire
                        </option>
                        <option value="NJ">
                          New Jersey
                        </option>
                        <option value="NM">
                          New Mexico
                        </option>
                        <option value="NY">
                          New York
                        </option>
                        <option value="NC">
                          North Carolina
                        </option>
                        <option value="ND">
                          North Dakota
                        </option>
                        <option value="OH">
                          Ohio
                        </option>
                        <option value="OK">
                          Oklahoma
                        </option>
                        <option value="OR">
                          Oregon
                        </option>
                        <option value="PA">
                          Pennsylvania
                        </option>
                        <option value="RI">
                          Rhode Island
                        </option>
                        <option value="SC">
                          South Carolina
                        </option>
                        <option value="SD">
                          South Dakota
                        </option>
                        <option value="TN">
                          Tennessee
                        </option>
                        <option value="TX">
                          Texas
                        </option>
                        <option value="UT">
                          Utah
                        </option>
                        <option value="VT">
                          Vermont
                        </option>
                        <option value="VA">
                          Virginia
                        </option>
                        <option value="WA">
                          Washington
                        </option>
                        <option value="WV">
                          West Virginia
                        </option>
                        <option value="WI">
                          Wisconsin
                        </option>
                        <option value="WY">
                          Wyoming
                        </option>
                      </select>
                      <label>
                        State / Province *
                      </label>
                      <select class="">
                        <option value="AL">
                          Alabama
                        </option>
                        <option value="AK">
                          Alaska
                        </option>
                        <option value="AZ">
                          Arizona
                        </option>
                        <option value="AR">
                          Arkansas
                        </option>
                        <option value="CA">
                          California
                        </option>
                        <option value="CO">
                          Colorado
                        </option>
                        <option value="CT">
                          Connecticut
                        </option>
                        <option value="DE">
                          Delaware
                        </option>
                        <option value="DC">
                          District Of Columbia
                        </option>
                        <option value="FL">
                          Florida
                        </option>
                        <option value="GA">
                          Georgia
                        </option>
                        <option value="HI">
                          Hawaii
                        </option>
                        <option value="ID">
                          Idaho
                        </option>
                        <option selected="" value="IL">
                          Illinois
                        </option>
                        <option value="IN">
                          Indiana
                        </option>
                        <option value="IA">
                          Iowa
                        </option>
                        <option value="KS">
                          Kansas
                        </option>
                        <option value="KY">
                          Kentucky
                        </option>
                        <option value="LA">
                          Louisiana
                        </option>
                        <option value="ME">
                          Maine
                        </option>
                        <option value="MD">
                          Maryland
                        </option>
                        <option value="MA">
                          Massachusetts
                        </option>
                        <option value="MI">
                          Michigan
                        </option>
                        <option value="MN">
                          Minnesota
                        </option>
                        <option value="MS">
                          Mississippi
                        </option>
                        <option value="MO">
                          Missouri
                        </option>
                        <option value="MT">
                          Montana
                        </option>
                        <option value="NE">
                          Nebraska
                        </option>
                        <option value="NV">
                          Nevada
                        </option>
                        <option value="NH">
                          New Hampshire
                        </option>
                        <option value="NJ">
                          New Jersey
                        </option>
                        <option value="NM">
                          New Mexico
                        </option>
                        <option value="NY">
                          New York
                        </option>
                        <option value="NC">
                          North Carolina
                        </option>
                        <option value="ND">
                          North Dakota
                        </option>
                        <option value="OH">
                          Ohio
                        </option>
                        <option value="OK">
                          Oklahoma
                        </option>
                        <option value="OR">
                          Oregon
                        </option>
                        <option value="PA">
                          Pennsylvania
                        </option>
                        <option value="RI">
                          Rhode Island
                        </option>
                        <option value="SC">
                          South Carolina
                        </option>
                        <option value="SD">
                          South Dakota
                        </option>
                        <option value="TN">
                          Tennessee
                        </option>
                        <option value="TX">
                          Texas
                        </option>
                        <option value="UT">
                          Utah
                        </option>
                        <option value="VT">
                          Vermont
                        </option>
                        <option value="VA">
                          Virginia
                        </option>
                        <option value="WA">
                          Washington
                        </option>
                        <option value="WV">
                          West Virginia
                        </option>
                        <option value="WI">
                          Wisconsin
                        </option>
                        <option value="WY">
                          Wyoming
                        </option>
                      </select>
                      <label>
                        Zip / Post Code *
                      </label>
                      <select class="">
                        <option value="AL">
                          Alabama
                        </option>
                        <option value="AK">
                          Alaska
                        </option>
                        <option value="AZ">
                          Arizona
                        </option>
                        <option value="AR">
                          Arkansas
                        </option>
                        <option value="CA">
                          California
                        </option>
                        <option value="CO">
                          Colorado
                        </option>
                        <option value="CT">
                          Connecticut
                        </option>
                        <option value="DE">
                          Delaware
                        </option>
                        <option value="DC">
                          District Of Columbia
                        </option>
                        <option value="FL">
                          Florida
                        </option>
                        <option value="GA">
                          Georgia
                        </option>
                        <option value="HI">
                          Hawaii
                        </option>
                        <option value="ID">
                          Idaho
                        </option>
                        <option selected="" value="IL">
                          Illinois
                        </option>
                        <option value="IN">
                          Indiana
                        </option>
                        <option value="IA">
                          Iowa
                        </option>
                        <option value="KS">
                          Kansas
                        </option>
                        <option value="KY">
                          Kentucky
                        </option>
                        <option value="LA">
                          Louisiana
                        </option>
                        <option value="ME">
                          Maine
                        </option>
                        <option value="MD">
                          Maryland
                        </option>
                        <option value="MA">
                          Massachusetts
                        </option>
                        <option value="MI">
                          Michigan
                        </option>
                        <option value="MN">
                          Minnesota
                        </option>
                        <option value="MS">
                          Mississippi
                        </option>
                        <option value="MO">
                          Missouri
                        </option>
                        <option value="MT">
                          Montana
                        </option>
                        <option value="NE">
                          Nebraska
                        </option>
                        <option value="NV">
                          Nevada
                        </option>
                        <option value="NH">
                          New Hampshire
                        </option>
                        <option value="NJ">
                          New Jersey
                        </option>
                        <option value="NM">
                          New Mexico
                        </option>
                        <option value="NY">
                          New York
                        </option>
                        <option value="NC">
                          North Carolina
                        </option>
                        <option value="ND">
                          North Dakota
                        </option>
                        <option value="OH">
                          Ohio
                        </option>
                        <option value="OK">
                          Oklahoma
                        </option>
                        <option value="OR">
                          Oregon
                        </option>
                        <option value="PA">
                          Pennsylvania
                        </option>
                        <option value="RI">
                          Rhode Island
                        </option>
                        <option value="SC">
                          South Carolina
                        </option>
                        <option value="SD">
                          South Dakota
                        </option>
                        <option value="TN">
                          Tennessee
                        </option>
                        <option value="TX">
                          Texas
                        </option>
                        <option value="UT">
                          Utah
                        </option>
                        <option value="VT">
                          Vermont
                        </option>
                        <option value="VA">
                          Virginia
                        </option>
                        <option value="WA">
                          Washington
                        </option>
                        <option value="WV">
                          West Virginia
                        </option>
                        <option value="WI">
                          Wisconsin
                        </option>
                        <option value="WY">
                          Wyoming
                        </option>
                      </select>
                      <div class="clearfix">
                      </div>
                      <button>
                        Get A Qoute
                      </button>
                    </form>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="shippingbox">
                    <h5>
                      Discount Codes
                    </h5>
                    <form>
                      <label>
                        Enter your coupon code if you have one
                      </label>
                      <input type="text" name="">
                      <div class="clearfix">
                      </div>
                      <button>
                        Get A Qoute
                      </button>
                    </form>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="shippingbox">
                    <div class="subtotal">
                      <h5>
                        Sub Total
                      </h5>
                      <span>
                        $1.000.00
                      </span>
                    </div>
                    <div class="grandtotal">
                      <h5>
                        GRAND TOTAL 
                      </h5>
                      <span>
                        $1.000.00
                      </span>
                    </div>
                    <button>
                      Process To Checkout
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
@stop