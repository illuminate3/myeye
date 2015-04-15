<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use Request;

class AdminProductController extends Controller {


    public function products(){

        return view('admin/products/default');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return Product::with('frame')->get();
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
        $product = new Product();
        $product->frame_id = Request::get('frame_id');
        $product->title = Request::get('title');
        $product->type = Request::get('type');
        $product->detail = Request::get('detail');
        $product->save();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return Product::findOrfail($id);
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
        $product = Product::findOrFail($id);
        $product->title = Request::get('title');
        $product->frame_id= Request::get('frame_id');
        $product->type= Request::get('type');
        $product->detail= Request::get('detail');
        $product->save();
        return 'true';
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $product = Product::findOrFail($id);
        $product->delete();
        return 'true';
	}

    public function active($id){
        $product = Product::findOrFail($id);
        $product->active = ! $product->active;
        $product->save();
        return 'true';
    }

    public function activeAll(){
        $inputs = (Request::all());
        return Product::activeAll($inputs);
    }

    public function deleteAll(){
        $inputs = (Request::all());
        return Product::deleteAll($inputs);
    }

}
