<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class UserController extends BaseController {

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
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return User::findOrFail($id);
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
		//
	}

	public function updateProfile()
	{
        if(! \Auth::check()){
            Flash::error('شما مجوز دسترسی به این صفحه را ندارید');
            return redirec('/');
        }
        return view('auth.user_update')->with('user',\Auth::user());
	}


	public function updateProfileStore(Request $request)
	{
        if(! \Auth::check()){
            Flash::error('شما مجوز دسترسی به این صفحه را ندارید');
            return redirec('/');
        }
        $this->validate($request, [
            'name' => 'required|max:255','phone' => 'regex:/[0-9]{8,12}/','mobile' => 'regex:/[0-9]{10,12}/','address' => 'min:10'
        ]);

        $user = \Auth::user();
        $user->name = $request->get('name');
        $user->phone = $request->get('phone');
        $user->mobile = $request->get('mobile');
        $user->address = $request->get('address');
        $user->save();
        Flash::overlay('اطلاعات کاربری با موفقیت تصحیح شد ','ویرایش اطلاعات');
        return redirect('/');
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
