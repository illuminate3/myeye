<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\Frame;

class AdminFrameController extends Controller {


    public function frames(){

        return view('admin/frames/default');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return Frame::all();
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
        return Frame::create(Request::all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return Frame::findOrfail($id);
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
        $frame = Frame::findOrFail($id);
        $frame->title = Request::get('title');
        $frame->save();
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
        $frame = Frame::findOrFail($id);
        $frame->delete();
        return 'true';
	}

    public function active($id){
        $book = Frame::findOrFail($id);
        $book->active = ! $book->active;
        $book->save();
        return 'true';
    }

    public function activeAll(){
        $inputs = (Request::all());
        return Frame::activeAll($inputs);
    }

    public function deleteAll(){
        $inputs = (Request::all());
        return Frame::deleteAll($inputs);
    }

}
