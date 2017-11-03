<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorController extends Controller
{
	protected $VENDOR_URL;

    public function __construct(){
    	$this->VENDOR_URL = config('constants.VENDOR_URL');
    }
}
