<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Laracasts\Flash\Flash;
use Request;

class PurchaseController extends Controller {


	public function store()
	{
        $user = \Auth::user();
        $user_orders = $user->orders()->whereActive(0)->get();
        if($user_orders->count() < 1){
            Flash::error('سبد خرید شما خالی است! ');
            return redirect('/shop/#/basket');
        }
        foreach($user_orders as $order){
            $order->active =1;
            $order->save();
        }
        Flash::success('سفارش شما با موفقیت ثبت گردید. در اولین فرصت گروه ما با شما تماس خواهند گرفت');
		return redirect('/');
	}

    public function updateUser(){
        $rules = ['phone' => 'required|regex:/[0-9]{8,12}/', 'mobile' => 'required|regex:/[0-9]{10,12}/', 'address' => 'required|min:10'];
        $validator = \Validator::make(array_map('trim',Request::all()), $rules);

        if ($validator->fails())
        {
            return \Redirect::back()->withErrors($validator)->withInput();
        }
        $user = \Auth::user();
        $user->phone = \Request::get('phone');
        $user->mobile = \Request::get('mobile');
        $user->address = \Request::get('address');
        $user->save();
        return redirect('/purchase');
    }


}
