<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Mail;

class QuestionController extends BaseController {


	public function index()
	{
		return view('/question/index');
	}


	public function store(Request $request)
	{
        $this->validate($request, [
            'title' => 'required', 'message' => 'required'
        ]);
        $user = \Auth::id();
        $title = $request->get('title');
        $body = $request->get('message');
        \App\Question::create(['title'=>$title,'user_id'=>$user,'body'=>$body]);
        Flash::overlay(' سوال شما با موفیقت فرستاده شد. به زودی همکاران ما به سوال شما جواب خواهند داد-با تشکر فراوان', 'ثبت سوال');
        return redirect('/');

	}



}
