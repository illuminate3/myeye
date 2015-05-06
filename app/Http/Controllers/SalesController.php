<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Order;
use App\User;
use Request;

class SalesController extends Controller {

    public function ordersAll(){
        return User::with(['orders'=>function($query){
           // $query->groupBy('active');
        }])->has('orders') ->get();
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('admin/sales/default');
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
        return \DB::table('orders')->whereUser_id($id)
            ->leftJoin('material_product',function($join) {
                $join->on('material_product.id', '=', 'orders.material_product_id');
            })
            ->leftJoin('products',function($join) {
                $join->on('material_product.product_id', '=', 'products.id');
            })
            ->leftJoin('materials',function($join) {
                $join->on('material_product.material_id', '=', 'materials.id');
            })
            ->leftJoin('sunglassesLenses',function($join) {
                $join->on('sunglassesLenses.id', '=', 'orders.sunglassesLense_id');
            })->select('products.title','materials.title As material_title','material_product.image_main_front As material_product_image','material_product.price','sunglassesLenses.image_main_front As lense_image','orders.count','orders.active','orders.seen')
            ->leftJoin('lenses',function($join) {
                $join->on('sunglassesLenses.lense_id', '=', 'lenses.id');
            })->select('orders.id','lenses.image as raw_lense_image','lenses.title As lense_title','products.title','materials.title As material_title','material_product.image_main_front As material_product_image','material_product.price','sunglassesLenses.image_main_front As lense_image','orders.count','orders.active','orders.seen')
            ->get();
	}

    public function acceptedOrder($id){
        $order = Order::findOrFail($id);
        $order->seen = 1;
        $order->save();
        return 'true';
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
        $order = Order::findOrFail($id);
        $order->delete();
        return 'true';
	}

}
