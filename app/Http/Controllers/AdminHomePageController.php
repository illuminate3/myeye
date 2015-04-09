<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

class AdminHomePageController extends Controller {

	public function index()
	{
        // $page = Page::whereTitle('home')->first();
        // if(! $page){
        //     $page=null;
        // }
        // ,compact('page')

		return view('admin.home.index');


	}

}
