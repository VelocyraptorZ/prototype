<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ShippingProvider;
use App\Models\ShippingMode;
class ShippingController extends Controller
{
    //
    public function modes()
    {
        return view('shipping.modes');
    }
    public function providers()
    {
        return view('shipping.providers');
    }
    public function awbs()
    {
        return view('shipping.awbs');
    }
}