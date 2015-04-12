<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\MaterialProduct;
use App\Sunglass_Lense;

class AdminSunglassesLensesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function details(){
        //$product = $this->getProduct($id);

        return view('admin/sunglasses_lenses/default');
    }

    public function lensesAll($id){
        $material_product = MaterialProduct::find($id);
        return $material_product->lenses;
    }

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

        if( $file = Request::file('fileMainFront')){
            $name = $file->getClientOriginalName();
            Request::file('fileMainFront')->move('images/sunglasses_lenses', $name);
            return 'true';
        }
        elseif( $file = Request::file('fileMainSide')){
            $name = $file->getClientOriginalName();
            Request::file('fileMainSide')->move('images/sunglasses_lenses', $name);
            return 'true';
        }
        else{
            $input = Request::all();
            $input['image_main_side'] = '/images/sunglasses_lenses/'.$input['fileMainSide'];
            $input['image_main_front'] = '/images/sunglasses_lenses/'.$input['fileMainFront'];
            return Sunglass_Lense::create($input);
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
        return Sunglass_Lense::findOrFail($id);

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
        $sunglass_lense = Sunglass_Lense::findOrFail($id);
        $sunglass_lense->lense_id = Request::get('lense_id');
        $sunglass_lense->save();
        return 'true';
	}

    public function editUpload($id){

        if( $file = Request::file('fileMainFront')){
            $name = $file->getClientOriginalName();
            Request::file('fileMainFront')->move('images/sunglassesLenses', $name);
            $sunglasse_lense = Sunglass_Lense::findOrFail($id);
            $sunglasse_lense->image_main_front = '/images/sunglassesLenses/'.$name;
            $sunglasse_lense->save();
            return 'true';
        }
        if( $file = Request::file('fileMainSide')){
            $name = $file->getClientOriginalName();
            Request::file('fileMainSide')->move('images/sunglassesLenses', $name);
            $sunglasse_lense = Sunglass_Lense::findOrFail($id);
            $sunglasse_lense->image_main_side = '/images/sunglassesLenses/'.$name;
            $sunglasse_lense->save();
            return 'true';
        }

    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$sunglass_lense = Sunglass_Lense::findOrFail($id);
        $sunglass_lense->delete();
        return 'true';
	}

    public function active($id){
        $sunglass_lense = Sunglass_Lense::findOrFail($id);
        $sunglass_lense->active = ! $sunglass_lense->active;
        $sunglass_lense->save();
        return 'true';
    }

    public function activeAll(){
        $inputs = (Request::all());
        return Sunglass_Lense::activeAll($inputs);
    }

    public function deleteAll(){
        $inputs = (Request::all());
        return Sunglass_Lense::deleteAll($inputs);
    }


}
