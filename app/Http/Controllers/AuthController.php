<?php

namespace App\Http\Controllers;

use App\Services\Authentication\Authentication;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{

    public function __construct()
    {

    }

    public function otp(Request $request)
    {
        return Authentication::sendOtp($request);
    }

    public function resendOtp(Request $request)
    {
        return Authentication::resendOtp($request);
    }

    public function token(Request $request)
    {
        return Authentication::generateToken($request);
    }

    public function checkToken()
    {
        return response('Your token is valid!', Response::HTTP_OK);
    }

}
