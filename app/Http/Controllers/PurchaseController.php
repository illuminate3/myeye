<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Laracasts\Flash\Flash;
use Request;

class PurchaseController extends BaseController {


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
        $email_title = \Setting::get('title');
        $body = \Setting::get('body');
        \Mail::send('emails.messageOrder',['body'=>$body],function($message) use  ($user,$email_title){
            $message->to($user->email)->subject($email_title);
        });
       // $this->sendSms($user);
        Flash::overlay('سفارش شما با موفقیت ثبت گردید! در اسرع وقت همکاران ما با شما تماس خواهند گرفت. با تشکر از انتخاب شما', 'سفارش');
		return redirect('/');
	}

    public function sendSms($user){
        try{
            $client = new \SoapClient('http://sms-webservice.ir/v1/v1.asmx?WSDL');

            $parameters['Username'] = '09399093462';
            $parameters['PassWord'] = "512562";
            $parameters['SenderNumber'] = "50002060378944";
            $parameters['RecipientNumbers'] = array("09399093462");
            $parameters['MessageBodie'] = "مشترک گرامی محصول شما با موفقیت ثبت شدÊÓÊ";
            $parameters['Type'] = 1;
            $parameters['AllowedDelay'] = 0;

            $res = $client->GeCredit($parameters);
            echo $res->GeCreditResult;
            $res = $client->SendMessage($parameters);
            foreach ($res->SendMessageResult as $r)
                echo $r;
        }
        catch (SoapFault $ex)
        {
            echo $ex->faultstring;
        }
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
