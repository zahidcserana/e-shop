<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function seoUrl($string)
    {
        //Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
        $string = strtolower(trim($string));
        //Strip any unwanted characters
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return trim($string);
    }

    public function customerInfo($data)
    {
        $customer = DB::table('customers')->where('mobile', $data['mobile'])->first();
        if (!empty($customer))
            return $customer->id;

        $customerInput = array(
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'email' => $data['email'] ?? '',
            'address' => $data['address'] ?? '',
            'created_at' => date('Y-m-d H:i:s'),
        );
        $customerId = DB::table('customers')->insertGetid($customerInput);
        return $customerId;
    }
}
