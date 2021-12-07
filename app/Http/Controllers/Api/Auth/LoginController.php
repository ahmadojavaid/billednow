<?php
/**
 * Created by PhpStorm.
 * User: JBBravo
 * Date: 17-Jun-19
 * Time: 10:14 AM
 */

namespace BilledNow\Http\Controllers\Api\Auth;


use BilledNow\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public $decayMinutes = 5; // minutes to lockout
    public $maxAttempts = 3; // number of attempts before lockout

}