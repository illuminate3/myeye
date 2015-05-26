<?php namespace App\Http\Controllers;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

//	/**
//	 * Create a new controller instance.
//	 *
//	 * @return void
//	 */
//	public function __construct()
//	{
//		$this->middleware('auth');
//	}

	public function index()
	{
        $slide_shows = \App\Slideshow::all();
        $msg = \App\Page::wherePage('main')->first();
        if($msg){
            $images =  \DB::table('material_product')->whereSlide_show(1)
                ->leftJoin('products',function($join) {
                    $join->on('material_product.product_id', '=', 'products.id');
                })
                ->select('material_product.id As material_product_id','material_product.image_main_front','material_product.image_item_front','products.title','products.type','products.id As product_id')
                ->get();
            return view('home')->with('slide_shows',$slide_shows)->with('msg',$msg)->with('items',$images);
        }else{
            return 'نقص اطلاعات';
        }

	}

}
