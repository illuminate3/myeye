<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\Page;

class PagesController extends Controller {


	public function index($title)
	{
		$page = Page::wherePage($title)->first();
//        if(empty($page)){
//            return '';
//        }
        return $page->description;
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


	public function store($title)
	{
        //return $title;
        $text = Request::get('description');
        $page = Page::where('page',$title)->first();
        if(!$page){
            $page = new Page();
            $page->page = $title;
            $page->description = $text;
            $page->save();
            return 'true';
        }else{
            return $this->update($page,$text);
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


	protected  function update($page,$text)
	{
        $page->description = $text;
        $page->save();
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
		//
	}

}
