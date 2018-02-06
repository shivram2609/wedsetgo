<?php
    namespace App\Http\Middleware;
    use Closure;
    use Auth;
    use Session;
    class ProfessionalMiddleware
    {
        /**
         * Handle an incoming request. User must be logged in to do admin check
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle($request, Closure $next)
        {    
			if(\Auth::check()){
				if (Auth::user()->user_type_id == 2) {
					return $next($request);
				} else {
					//Session::flash('error_message', 'You are not authorised to perform this action.');	
					return redirect('/');
				}
			} else {
				//Session::flash('error_message', 'You are not authorised to perform this action.');	
				return redirect('/');
	  	    }
           
            return redirect()->guest('/');
        }
    }
?>
