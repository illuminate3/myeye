<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Question;
use App\User;
use Request;

class AdminQuestionsController extends Controller {


    public function questionsAll(){
        return Question::all();
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.questions.default');
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

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Question::findOrFail($id);
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
        $question = Question::findOrFail($id);
        $title_answer = Request::get('title_answer');
        $user_id = Request::get('user_id');
        $user = User::findOrFail($user_id);
        $answer = Request::get('answer');
        $question->title_answer = $title_answer;
        $question->answer = $answer;
        $question->checked =1;
        $question->save();
        \Mail::send('emails.answer_question',['question'=>$answer],function($message) use  ($title_answer,$user){
            $message->to($user->email)->subject($title_answer);
        });
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
        $question = Question::findOrFail($id);
        $question->delete();
        return 'true';
    }

//    public function active($id){
//        $question = Question::findOrFail($id);
//        $question->active = ! $question->active;
//        $question->save();
//        return 'true';
//    }

    public function deleteAll(){
        $inputs = (Request::all());
        return Lense::deleteAll($inputs);
    }

}
