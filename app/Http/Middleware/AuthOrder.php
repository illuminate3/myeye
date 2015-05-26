<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Laracasts\Flash\Flash;

class AuthOrder {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */

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

	public function handle($request, Closure $next)
	{

        if (! $user = $this->auth->user()){

            Flash::message('برای دیدن سبد خرید باید با اکانت کاربری خود وارد شوید');
            return view('auth.login')->with('basket_count',0);

        }


		return $next($request);
	}

}
