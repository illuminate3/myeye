<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class UserDetails {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $user = $this->auth->user();
		if ( !$user->phone || !$user->mobile || !$user->address)
		{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
                return view('auth/user_detail')->with('user',$user)->with('basket_count',0);
			}
		}

		return $next($request);
	}

}
