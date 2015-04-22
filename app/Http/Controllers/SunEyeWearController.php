<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

use App\Product;
use App\Sunglass_Lense;

class SunEyeWearController extends Controller {


    public function getAll(){

        $title = 'عینک آفتابی  ';
        return view('products.sunEyewearProducts',['title'=>$title]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $col = Product::whereType(0)->where('products.active', '=', '1')->with(array('materials' => function($query)
        {
            $query->where('materials.active', '=', '1');

        }))->get();

        return $col;

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
     **/
    public function showProduct()
    {
        $title = 'عینک آفتابی  ';
        return view('products.sunEyewear',['title'=>$title]);
    }

    public function show($id)
    {
        return \DB::table('material_product')->where('material_product.id','=',$id)->whereType(0)
            ->leftJoin('products',function($join) {
                $join->on('products.id', '=', 'material_product.product_id');
                // ->where('product.active','=',1);
            })
            ->leftJoin('materials',function($join) {
                $join->on('materials.id', '=', 'material_product.material_id');
                //->where('material.active','=',1);
            })->select('products.title As product_title','materials.title As material_title','material_product.id','material_product.price','material_product.image_main_front','material_product.image_main_side','material_product.material_id','material_product.product_id')
            ->get();
        // return MaterialProduct::findOrFail($id);
    }

    public function lenses($id){
        return Sunglass_Lense::whereMaterial_product_id($id)->whereActive(1)->with(array('lense' => function($query)
        {
            $query->where('lenses.active', '=', '1');

        }))->get();
    }

    public function eyewearsWithId($id){
        return \DB::table('material_product')->where('material_product.product_id','=',$id)->whereType(0)
            ->leftJoin('products',function($join) {
                $join->on('products.id', '=', 'material_product.product_id');
                // ->where('product.active','=',1);
            })
            ->leftJoin('materials',function($join) {
                $join->on('materials.id', '=', 'material_product.material_id');
                //->where('material.active','=',1);
            })->select('products.title As product_title','materials.title As material_title','material_product.id','material_product.price','material_product.image_item_front','material_product.image_item_side','material_product.material_id','material_product.product_id')
            ->get();
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
