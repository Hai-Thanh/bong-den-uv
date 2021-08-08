<?php

namespace App\Http\Middleware;

use App\Models\Customer;

use Closure;
use Illuminate\Http\Request;

class Customers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $customer_login_remember = $request->cookie('customer_login_remember');
        if($customer_login_remember){

            $customerCookie = Customer::where('remember_token' , '=' , $customer_login_remember)->first();

            if(isset($customerCookie->id) && ($customerCookie->id >0)){
                return $next($request);
            }
        }
        $session_customer_login = session('customer_login', false);
        if(!$session_customer_login){
            return redirect()->route('login.customers');
        }
        return $next($request);
    }
}
