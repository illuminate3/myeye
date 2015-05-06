<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\Order;

class ShopController extends Controller {


    public function shop(){
        $user = \Auth::id();
        return \DB::table('orders')->where('orders.active','=',0)->whereUser_id($user)
            ->leftJoin('material_product',function($join) {
                $join->on('material_product.id', '=', 'orders.material_product_id');
                // ->where('product.active','=',1);
            })
            ->leftJoin('sunglassesLenses',function($join) {
                $join->on('orders.sunglassesLense_id', '=', 'sunglassesLenses.id');
                //->where('material.active','=',1);
            })->leftJoin('materials',function($join) {
                $join->on('materials.id', '=', 'material_product.material_id');
                // ->where('product.active','=',1);
            })->leftJoin('products',function($join) {
                $join->on('products.id', '=', 'material_product.product_id');
                // ->where('product.active','=',1);
            })
            ->select('orders.id','orders.material_product_id','orders.sunglassesLense_id','orders.count','material_product.price','material_product.image_main_front As material_product_Image','sunglassesLenses.image_main_front As sunglass_image','products.title As product_title','materials.title As material_title')
            ->get();

        return Order::whereActive(0)->with('material_product')->with('sunglassesLense')->get();
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('shop.default');
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
        $count  = Request::get('quantity');
        $order = Order::findOrFail($id);
        $order->count = $count;
        $order->save();
        return $order;
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $order = Order::findOrFail($id);
        $order->delete();
        return 'true';
	}

}
