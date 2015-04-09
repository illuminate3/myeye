<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\Lense;
class AdminLensesController extends Controller {


    public function lenses(){

        return view('admin/lenses/default');

    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Lense::all();
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
            Request::file('file')->move('images/lenses', $name);
            return 'true';
        }else{
            $input = Request::all();
            $input['image'] = '/images/lenses/'.$input['file'];
            return Lense::create($input);
        }
	}

    public function editUpload($id){
        $file =  Request::file('file');
        if($file) {
            $name = $file->getClientOriginalName();
            Request::file('file')->move('images/lenses', $name);
            $lense = Lense::findOrFail($id);
            $lense->image = '/images/lenses/'.$name;
            $lense->save();
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
		return Lense::find($id);
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
        $lense = Lense::findOrFail($id);
        $lense->title = Request::get('title');
        $lense->price = Request::get('price');
        $lense->save();
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
        $lense = Lense::findOrFail($id);
        $lense->delete();
        return 'true';
    }

    public function active($id){
        $lense = Lense::findOrFail($id);
        $lense->active = ! $lense->active;
        $lense->save();
        return 'true';
    }

    public function activeAll(){
        $inputs = (Request::all());
        return Lense::activeAll($inputs);
    }

    public function deleteAll(){
        $inputs = (Request::all());
        return Lense::deleteAll($inputs);
    }

}
