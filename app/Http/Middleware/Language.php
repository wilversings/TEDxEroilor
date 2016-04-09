<?php namespace App\Http\Middleware;

use Closure;
use Session;
use App;

class Language {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        
        if (Session::has('applocale')) {
            App::setLocale(Session::get('applocale'));
        }
        setlocale(LC_ALL, App::getLocale());
        
		return $next($request);
	}

}
