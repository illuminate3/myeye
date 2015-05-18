<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Auth;

class BaseController extends Controller {

    public function __construct()
    {
        $user = Auth::id();
        //dd($user);
        if($user){
            $count = \App\Order::whereActive(0)->whereUser_id($user)->sum('count');
        }else{
            $count = 0;
        }

        view()->share('basket_count', $count);
    }

}
