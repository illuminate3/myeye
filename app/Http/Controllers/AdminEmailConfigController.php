<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

class AdminEmailConfigController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('emails.adminEmailSetting');
	}

    public function body(){

        return \Setting::get('body');

    }

    public function title(){

        return \Setting::get('title');

    }

	public function store()
	{
        $title = Request::get('title');
        $body = Request::get('body');

        \Setting::set('body',$body);
        \Setting::set('title',$title);

        return 'true';
	}


}
