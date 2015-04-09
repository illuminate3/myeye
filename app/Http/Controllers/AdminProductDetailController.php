<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

use App\Product;
use App\MaterialProduct;

class AdminProductDetailController extends Controller {


    public function details($id){
        $product = $this->getProduct($id);

        return view('admin/details/default',compact('product'));
    }

    public function showProductsDetails($id){
        $product =  $this->getProduct($id);
        $result = $product->materials;
        return  $result;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
        if( $file = Request::file('fileItemFront')){
            $name = $file->getClientOriginalName();
            Request::file('fileItemFront')->move('images/products_item', $name);
            return 'true';
        }
        elseif( $file = Request::file('fileItemSide')){
            $name = $file->getClientOriginalName();
            Request::file('fileItemSide')->move('images/products_item', $name);
            return 'true';
        }
        elseif( $file = Request::file('fileMainFront')){
            $name = $file->getClientOriginalName();
            Request::file('fileMainFront')->move('images/product', $name);
            return 'true';
        }
        elseif( $file = Request::file('fileMainSide')){
            $name = $file->getClientOriginalName();
            Request::file('fileMainSide')->move('images/product', $name);
            return 'true';
        }
        else{
            $input = Request::all();
            $input['image_item_front'] = '/images/products_item/'.$input['fileItemFront'];
            $input['image_item_side'] = '/images/products_item/'.$input['fileItemSide'];
            $input['image_main_side'] = '/images/product/'.$input['fileMainSide'];
            $input['image_main_front'] = '/images/product/'.$input['fileMainFront'];
            return MaterialProduct::create($input);
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return MaterialProduct::find($id);
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
        $material_product = MaterialProduct::findOrFail($id);
        $material_product->price = Request::get('price');
        $material_product->material_id = Request::get('material_id');
        $material_product->save();
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
        $material_product = MaterialProduct::findOrFail($id);
        $material_product->delete();
        return 'true';
    }

    public function active($id){
        $material_product = MaterialProduct::findOrFail($id);
        $material_product->active = ! $material_product->active;
        $material_product->save();
        return 'true';
    }

    public function activeAll(){
        $inputs = (Request::all());
        return MaterialProduct::activeAll($inputs);
    }

    public function deleteAll(){
        $inputs = (Request::all());
        return MaterialProduct::deleteAll($inputs);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProduct($id)
    {
        $product = Product::whereId($id)->with('frame')->first();
        return $product;
    }

    public function editUpload($id){
        if( $file = Request::file('fileItemFront')){
            $name = $file->getClientOriginalName();
            Request::file('fileItemFront')->move('images/products_item', $name);
            $material_product = MaterialProduct::findOrFail($id);
            $material_product->image_item_front = '/images/products_item/'.$name;
            $material_product->save();
            return 'true';
        }
        if( $file = Request::file('fileItemSide')){
            $name = $file->getClientOriginalName();
            Request::file('fileItemSide')->move('images/products_item', $name);
            $material_product = MaterialProduct::findOrFail($id);
            $material_product->image_item_side = '/images/products_item/'.$name;
            $material_product->save();
            return 'true';
        }
        if( $file = Request::file('fileMainFront')){
            $name = $file->getClientOriginalName();
            Request::file('fileMainFront')->move('images/product', $name);
            $material_product = MaterialProduct::findOrFail($id);
            $material_product->image_main_front = '/images/product/'.$name;
            $material_product->save();
            return 'true';
        }
        if( $file = Request::file('fileMainSide')){
            $name = $file->getClientOriginalName();
            Request::file('fileMainSide')->move('images/product', $name);
            $material_product = MaterialProduct::findOrFail($id);
            $material_product->image_main_side = '/images/product/'.$name;
            $material_product->save();
            return 'true';
        }

    }

}
