<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AdminFirewall {

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

            return redirect()->guest('auth/login');

        }

        if(! $user->role == 1){

            $this->auth->logout();
            return redirect()->guest('auth/login')->withErrors([
                'error' => 'شما امکان دسترسی به این صفحه را ندارید  ',
            ]);;
        }

		return $next($request);
	}

}
