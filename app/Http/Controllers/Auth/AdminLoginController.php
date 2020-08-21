<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Binding;
use App\User;
use App\Shipment;
use App\Order;
use App\PaymentLocal;
use App\PaymentOversea;
class AdminLoginController extends Controller
{
   public function login()
    {
        return view('auth.admin-login');
    }

    public function doLogin(Request $request)
    {
        if(auth('web')->attempt(['email'=>$request->email, 'password'=> $request->password],$request->remember))
        {
            return redirect()->route('admin.index')->with('success','Login success');
            //you can use intented() when they trying to login before authentication filter
        }
        return redirect()->back()->with('error','Email or password not correct')->withInput($request->only('email','remember'));
            //withInput to save the old email input
    }

    public function logout()
    {
        auth('web')->logout();
        return redirect()->route('admin.login');
    }
    public function index(Request $request)
    {
        $account = Cache::remember('account', 60, function () {
            return User::selectRaw('count(id) as number')->first();
        });
        $orders = Cache::remember('orders', 60, function () {
            return Order::selectRaw('count(id) as number')->first();
        });
        $shipments = Cache::remember('shipments', 60, function () {
            return Shipment::selectRaw('count(id) as number')->first();
        }); 
        $yearOrder = Order::selectRaw('year(po_date) as po')->groupBy('po')->get();
        $local = PaymentLocal::selectRaw('count(id) as number')->first();
        $oversea = PaymentOversea::selectRaw('count(id) as number')->first();
        $payment = $local->number + $oversea->number;
        $year = $request->year ?? 2020;
        $month = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
        $order = Order::selectRaw("count(id) as count, ANY_VALUE(month(po_date)) as month")->whereYear('po_date',$year)->groupBy("month")->get()->toArray();
        return view('admin.dashboard',compact('account','orders','shipments','payment','yearOrder','year'))->with('month',json_encode($month,JSON_NUMERIC_CHECK))->with('order',json_encode($order,JSON_NUMERIC_CHECK));
        //JSON_NUM... nếu là số thì tự động thành số. còn k sẽ là string.
    }
}
