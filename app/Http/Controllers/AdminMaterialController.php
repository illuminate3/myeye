<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Material;
use Request;

class AdminMaterialController extends Controller {


    public function materials(){

        return view('admin/materials/default');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Material::all();
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
        $file =  Request::file('file');
        if($file) {
            $name = $file->getClientOriginalName();
            Request::file('file')->move('images/materials', $name);
            return 'true';
        }else{
            $input = Request::all();
            $input['image'] = '/images/materials/'.$input['file'];
            return Material::create($input);
        }

    }

    public function editUpload($id){
        $file =  Request::file('file');
        if($file) {
            $name = $file->getClientOriginalName();
            Request::file('file')->move('images/materials', $name);
            $material = Material::findOrFail($id);
            $material->image = '/images/materials/'.$name;
            $material->save();
            return 'true';
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
        return Material::findOrfail($id);
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
        $material = Material::findOrFail($id);
        $material->title = Request::get('title');
        $material->detail = Request::get('detail');
        $material->save();
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
        $material = Material::findOrFail($id);
        $material->delete();
        return 'true';
	}

    public function active($id){
        $material = Material::findOrFail($id);
        $material->active = ! $material->active;
        $material->save();
        return 'true';
    }

    public function activeAll(){
        $inputs = (Request::all());
        return Material::activeAll($inputs);
    }

    public function deleteAll(){
        $inputs = (Request::all());
        return Material::deleteAll($inputs);
    }

}
