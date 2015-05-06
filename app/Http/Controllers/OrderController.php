<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Request;
use App\Sunglass_Lense;
use App\MaterialProduct;
use App\Order;
use App\Product;

class OrderController extends Controller {


	public function index($product_id,$sunglass_id)
	{
       // $url = Request::url();
        //dd($sunglass_id);
        $user =  \Auth::user();
        $count = 1;
        if( $sunglass_id ){
            Sunglass_Lense::whereId($sunglass_id)->whereMaterial_product_id($product_id)->firstOrFail();
        }
        $material_product = MaterialProduct::findOrFail($product_id);
        $productId = $material_product->product_id;
        $p = Product::find($material_product->product_id);
        $p->type == 1 ? $url = "/eyewear-product/#/rxeyewear/$product_id/$productId" : $url="/sunEyewear-product/#/suneyewear/$product_id/$productId";
        if($o=Order::whereUser_id($user->id)->whereActive(0)->whereMaterial_product_id($product_id)->where('sunglassesLense_id','=',$sunglass_id)->first()){
            $count = $o->count + $count;
            $o->count = $count;
            $o->save();
        }else{
            $order = new Order();
            $order->material_product_id = $product_id;
            $order->sunglassesLense_id = $sunglass_id;
            $order->count = $count;
            $order->user_id = $user->id;
            $order->save();
        }

        Flash::message('درخواست شما با موفقیت به سبد خرید اضافه شد! ');
        return redirect($url);


	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
