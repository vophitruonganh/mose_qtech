<?php

namespace App\Http\Controllers\backend\setting;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\backend\BackendController;

/*
 * Use Library of Laravel
 */
use App\Models\Option;
use App\Models\Provinces;
use App\Models\Districts;
use Validator;
use DB;
use Session;

class GeneralSettingController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        
        $userLevel = Session::get('user_level');
        if( $userLevel == 3 ) // Author
        {
            return redirect('admin')->send();
        }
    }

    public function index()
    {
        $optionObject = new Option;
        $provincesObject = new Provinces;
        $districtsObject = new Districts;
        $options = [];

        $options['store_name'] = $optionObject->getOptionValue_option('store_name');
        $options['account_email'] = $optionObject->getOptionValue_option('account_email');
        $options['customer_email'] = $optionObject->getOptionValue_option('customer_email');
        $options['business_name'] = $optionObject->getOptionValue_option('business_name');
        $options['store_phone'] = $optionObject->getOptionValue_option('store_phone');
        $options['store_address'] = $optionObject->getOptionValue_option('store_address');
        $options['store_province'] = $optionObject->getOptionValue_option('store_province');
        $options['store_district'] = $optionObject->getOptionValue_option('store_district');
        $options['timezone'] = $optionObject->getOptionValue_option('timezone');
        $options['country_format'] = $optionObject->getOptionValue_option('country_format');
        $options['country_currency'] = $optionObject->getOptionValue_option('country_currency');
        $options['order_prefix'] = $optionObject->getOptionValue_option('order_prefix');
        $options['order_suffix'] = $optionObject->getOptionValue_option('order_suffix');

        $timezones = $this->list_timezone();
        $provinces = $provincesObject->Get_all_provinces();
        $districts = $districtsObject->Get_districts_by_province_id($options['store_province']);

        return view('backend.pages.setting.generalSetting',[
            'options' => $options,
            'timezones' => $timezones,
            'provinces' => $provinces,
            'districts' => $districts,
        ]);
    }

    public function save(Request $request)
    {
        $optionObject = new Option;
        $provincesObject = new Provinces;
        $districtsObject = new Districts;
        $data = $request->all();

        /*-- Validator --*/
        $validator = Validator::make($data,[
            'store_name' => 'required',
            'account_email' => 'required|email|max:60',
            'customer_email' => 'required|email|max:60',
            'store_phone' => 'required|numeric|digits_between:8,11',
            'store_address' => 'required',
            'store_province' => 'required|not_in:choose',
            'store_district' => 'required|not_in:choose',
            'timezone' => 'required|not_in:choose',
            'country_format' => 'required|not_in:choose',
            'country_currency' => 'required|not_in:choose',
            'order_prefix' => 'max:20',
            'order_suffix' => 'max:20',
        ],[
            'store_name.required' => 'Tên cửa hàng không được để trống',

            'account_email.required' => 'Tài khoản email không được để trống',
            'account_email.email' => 'Tài khoản email không đúng định dạng',
            'account_email.max' => 'Tài khoản email tối đa 60 ký tự',

            'customer_email.required' => 'Email khách hàng không được để trống',
            'customer_email.email' => 'Email khách hàng không đúng định dạng',
            'customer_email.max' => 'Email khách hàng tối đa 60 ký tự',

            'store_phone.required' => 'Điện thoại không được để trống',
            'store_phone.numeric' => 'Điện thoại phải là số',
            'store_phone.digits_between' => 'Điện thoại có tối thiểu :min chữ số và tối đa :max',

            'store_address.required' => 'Địa chỉ không được để trống',

            'store_province.required' => 'Vui lòng chọn tỉnh/thành phố',
            'store_province.not_in' => 'Vui lòng chọn tỉnh/thành phố',

            'store_district.required' => 'Vui lòng chọn quận/huyện',
            'store_district.not_in' => 'Vui lòng chọn quận/huyện',

            'timezone.required' => 'Vui lòng chọn múi giờ',
            'timezone.not_in' => 'Vui lòng chọn múi giờ',

            'country_format.required' => 'Vui lòng chọn định dạng số',
            'country_format.not_in' => 'Vui lòng chọn định dạng số',

            'country_currency.required' => 'Vui lòng chọn định dạng tiền tệ',
            'country_currency.not_in' => 'Vui lòng chọn định dạng tiền tệ',

            'order_prefix.max' => 'Mã đơn hàng bắt đầu tối đa 20 ký tự',

            'order_suffix.max' => 'Mã đơn hàng kết thúc tối đa 20 ký tự',
        ]);
        
        if( $validator->fails() )
        {
            return redirect('admin/setting/general')->withErrors($validator)->withInput();
        }
        /*-- End Validator --*/

        $_explode = explode('@',$data['account_email']);
        if( strlen($_explode[0]) > 30 )
        {
            $validator->getMessageBag()->add('account_email','Tài khoản email trước ký tự @ có độ dài tối đa 30 ký tự');
            return redirect('admin/setting/general')->withErrors($validator)->withInput();
        }

        $_explode = explode('@',$data['customer_email']);
        if( strlen($_explode[0]) > 30 )
        {
            $validator->getMessageBag()->add('customer_email','Email khách hàng trước ký tự @ có độ dài tối đa 30 ký tự');
            return redirect('admin/setting/general')->withErrors($validator)->withInput();
        }

        $timezones = array_keys($this->list_timezone());
        if( !in_array($data['timezone'],$timezones))
        {
            $validator->getMessageBag()->add('timezone','Vui lòng chọn múi giờ');
            return redirect('admin/setting/general')->withErrors($validator)->withInput();
        }

        $data['store_province'] = isset($data['store_province']) ? $data['store_province'] : 0;
        $get_provinces_id = $provincesObject->Get_provinces_id($data['store_province']);
        if( $get_provinces_id == null )
        {
            $validator->getMessageBag()->add('store_province','Vui lòng chọn tỉnh/thành phố');
            return redirect('admin/setting/general')->withErrors($validator)->withInput();
        }

        $data['store_district'] = isset($data['store_district']) ? $data['store_district'] : 0;
        $check_district = $districtsObject->Check_district($data['store_district'],$data['store_province']);
        if( $check_district == null )
        {
            $validator->getMessageBag()->add('store_province','Vui lòng chọn quận/huyện');
            return redirect('admin/setting/general')->withErrors($validator)->withInput();
        }

        $optionObject->Update_option('store_name', $data['store_name']);
        $optionObject->Update_option('account_email', $data['account_email']);
        $optionObject->Update_option('customer_email', $data['customer_email']);
        $optionObject->Update_option('business_name', $data['business_name']);
        $optionObject->Update_option('store_phone', $data['store_phone']);
        $optionObject->Update_option('store_address', $data['store_address']);
        $optionObject->Update_option('store_province', $data['store_province']);
        $optionObject->Update_option('store_district', $data['store_district']);
        $optionObject->Update_option('timezone', $data['timezone']);
        $optionObject->Update_option('country_format', $data['country_format']);
        $optionObject->Update_option('country_currency', $data['country_currency']);
        $optionObject->Update_option('order_prefix', $data['order_prefix']);
        $optionObject->Update_option('order_suffix', $data['order_suffix']);

        return redirect('admin/setting/general');
    }

    private function list_timezone()
    {
        $timezones = array(
            'Pacific/Midway'       => "(GMT-11:00) Midway Island",
            'US/Samoa'             => "(GMT-11:00) Samoa",
            'US/Hawaii'            => "(GMT-10:00) Hawaii",
            'US/Alaska'            => "(GMT-09:00) Alaska",
            'US/Pacific'           => "(GMT-08:00) Pacific Time (US &amp; Canada)",
            'America/Tijuana'      => "(GMT-08:00) Tijuana",
            'US/Arizona'           => "(GMT-07:00) Arizona",
            'US/Mountain'          => "(GMT-07:00) Mountain Time (US &amp; Canada)",
            'America/Chihuahua'    => "(GMT-07:00) Chihuahua",
            'America/Mazatlan'     => "(GMT-07:00) Mazatlan",
            'America/Mexico_City'  => "(GMT-06:00) Mexico City",
            'America/Monterrey'    => "(GMT-06:00) Monterrey",
            'Canada/Saskatchewan'  => "(GMT-06:00) Saskatchewan",
            'US/Central'           => "(GMT-06:00) Central Time (US &amp; Canada)",
            'US/Eastern'           => "(GMT-05:00) Eastern Time (US &amp; Canada)",
            'US/East-Indiana'      => "(GMT-05:00) Indiana (East)",
            'America/Bogota'       => "(GMT-05:00) Bogota",
            'America/Lima'         => "(GMT-05:00) Lima",
            'America/Caracas'      => "(GMT-04:30) Caracas",
            'Canada/Atlantic'      => "(GMT-04:00) Atlantic Time (Canada)",
            'America/La_Paz'       => "(GMT-04:00) La Paz",
            'America/Santiago'     => "(GMT-04:00) Santiago",
            'Canada/Newfoundland'  => "(GMT-03:30) Newfoundland",
            'America/Buenos_Aires' => "(GMT-03:00) Buenos Aires",
            'Greenland'            => "(GMT-03:00) Greenland",
            'Atlantic/Stanley'     => "(GMT-02:00) Stanley",
            'Atlantic/Azores'      => "(GMT-01:00) Azores",
            'Atlantic/Cape_Verde'  => "(GMT-01:00) Cape Verde Is.",
            'Africa/Casablanca'    => "(GMT) Casablanca",
            'Europe/Dublin'        => "(GMT) Dublin",
            'Europe/Lisbon'        => "(GMT) Lisbon",
            'Europe/London'        => "(GMT) London",
            'Africa/Monrovia'      => "(GMT) Monrovia",
            'Europe/Amsterdam'     => "(GMT+01:00) Amsterdam",
            'Europe/Belgrade'      => "(GMT+01:00) Belgrade",
            'Europe/Berlin'        => "(GMT+01:00) Berlin",
            'Europe/Bratislava'    => "(GMT+01:00) Bratislava",
            'Europe/Brussels'      => "(GMT+01:00) Brussels",
            'Europe/Budapest'      => "(GMT+01:00) Budapest",
            'Europe/Copenhagen'    => "(GMT+01:00) Copenhagen",
            'Europe/Ljubljana'     => "(GMT+01:00) Ljubljana",
            'Europe/Madrid'        => "(GMT+01:00) Madrid",
            'Europe/Paris'         => "(GMT+01:00) Paris",
            'Europe/Prague'        => "(GMT+01:00) Prague",
            'Europe/Rome'          => "(GMT+01:00) Rome",
            'Europe/Sarajevo'      => "(GMT+01:00) Sarajevo",
            'Europe/Skopje'        => "(GMT+01:00) Skopje",
            'Europe/Stockholm'     => "(GMT+01:00) Stockholm",
            'Europe/Vienna'        => "(GMT+01:00) Vienna",
            'Europe/Warsaw'        => "(GMT+01:00) Warsaw",
            'Europe/Zagreb'        => "(GMT+01:00) Zagreb",
            'Europe/Athens'        => "(GMT+02:00) Athens",
            'Europe/Bucharest'     => "(GMT+02:00) Bucharest",
            'Africa/Cairo'         => "(GMT+02:00) Cairo",
            'Africa/Harare'        => "(GMT+02:00) Harare",
            'Europe/Helsinki'      => "(GMT+02:00) Helsinki",
            'Europe/Istanbul'      => "(GMT+02:00) Istanbul",
            'Asia/Jerusalem'       => "(GMT+02:00) Jerusalem",
            'Europe/Kiev'          => "(GMT+02:00) Kyiv",
            'Europe/Minsk'         => "(GMT+02:00) Minsk",
            'Europe/Riga'          => "(GMT+02:00) Riga",
            'Europe/Sofia'         => "(GMT+02:00) Sofia",
            'Europe/Tallinn'       => "(GMT+02:00) Tallinn",
            'Europe/Vilnius'       => "(GMT+02:00) Vilnius",
            'Asia/Baghdad'         => "(GMT+03:00) Baghdad",
            'Asia/Kuwait'          => "(GMT+03:00) Kuwait",
            'Africa/Nairobi'       => "(GMT+03:00) Nairobi",
            'Asia/Riyadh'          => "(GMT+03:00) Riyadh",
            'Europe/Moscow'        => "(GMT+03:00) Moscow",
            'Asia/Tehran'          => "(GMT+03:30) Tehran",
            'Asia/Baku'            => "(GMT+04:00) Baku",
            'Europe/Volgograd'     => "(GMT+04:00) Volgograd",
            'Asia/Muscat'          => "(GMT+04:00) Muscat",
            'Asia/Tbilisi'         => "(GMT+04:00) Tbilisi",
            'Asia/Yerevan'         => "(GMT+04:00) Yerevan",
            'Asia/Kabul'           => "(GMT+04:30) Kabul",
            'Asia/Karachi'         => "(GMT+05:00) Karachi",
            'Asia/Tashkent'        => "(GMT+05:00) Tashkent",
            'Asia/Kolkata'         => "(GMT+05:30) Kolkata",
            'Asia/Kathmandu'       => "(GMT+05:45) Kathmandu",
            'Asia/Yekaterinburg'   => "(GMT+06:00) Ekaterinburg",
            'Asia/Almaty'          => "(GMT+06:00) Almaty",
            'Asia/Dhaka'           => "(GMT+06:00) Dhaka",
            'Asia/Novosibirsk'     => "(GMT+07:00) Novosibirsk",
            'Asia/Bangkok'         => "(GMT+07:00) Bangkok",
            'Asia/Jakarta'         => "(GMT+07:00) Jakarta",
            'Asia/Krasnoyarsk'     => "(GMT+08:00) Krasnoyarsk",
            'Asia/Chongqing'       => "(GMT+08:00) Chongqing",
            'Asia/Hong_Kong'       => "(GMT+08:00) Hong Kong",
            'Asia/Kuala_Lumpur'    => "(GMT+08:00) Kuala Lumpur",
            'Australia/Perth'      => "(GMT+08:00) Perth",
            'Asia/Singapore'       => "(GMT+08:00) Singapore",
            'Asia/Taipei'          => "(GMT+08:00) Taipei",
            'Asia/Ulaanbaatar'     => "(GMT+08:00) Ulaan Bataar",
            'Asia/Urumqi'          => "(GMT+08:00) Urumqi",
            'Asia/Irkutsk'         => "(GMT+09:00) Irkutsk",
            'Asia/Seoul'           => "(GMT+09:00) Seoul",
            'Asia/Tokyo'           => "(GMT+09:00) Tokyo",
            'Australia/Adelaide'   => "(GMT+09:30) Adelaide",
            'Australia/Darwin'     => "(GMT+09:30) Darwin",
            'Asia/Yakutsk'         => "(GMT+10:00) Yakutsk",
            'Australia/Brisbane'   => "(GMT+10:00) Brisbane",
            'Australia/Canberra'   => "(GMT+10:00) Canberra",
            'Pacific/Guam'         => "(GMT+10:00) Guam",
            'Australia/Hobart'     => "(GMT+10:00) Hobart",
            'Australia/Melbourne'  => "(GMT+10:00) Melbourne",
            'Pacific/Port_Moresby' => "(GMT+10:00) Port Moresby",
            'Australia/Sydney'     => "(GMT+10:00) Sydney",
            'Asia/Vladivostok'     => "(GMT+11:00) Vladivostok",
            'Asia/Magadan'         => "(GMT+12:00) Magadan",
            'Pacific/Auckland'     => "(GMT+12:00) Auckland",
            'Pacific/Fiji'         => "(GMT+12:00) Fiji",
        );

        return $timezones;
    }
}
