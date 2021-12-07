<?php
/**
 * Created by PhpStorm.
 * User: JBBravo
 * Date: 17-Jun-19
 * Time: 12:57 PM
 */

namespace BilledNow\Http\Models;


use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $fillable = [
        'email', 'token'
    ];

}