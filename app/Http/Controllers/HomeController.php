<?php

namespace BilledNow\Http\Controllers;

use BilledNow\User;
use Illuminate\Http\Request;
use Stripe\Plan;
use Stripe\Stripe;
use Stripe\Token;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $user = User::find(1);

        $token = Token::create(array(
            "card" => array(
                "number"    => $request->get('cc-number'),
                "exp_month" => $request->get('cc-exp-month'),
                "exp_year"  => $request->get('cc-exp-year'),
                "cvc"       => $request->get('cc-cvc'),
                "name"      => $request->get('cc-name'))
        ));
        $var = $user->newSubscription('main','plan_FFlJf2JtY4R4FE')->create($token->id);

        echo json_encode($var);

    }

    public function index2(){
        return view('home');
    }

}
