<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return 'navid';
    }

    public function otp()
    {
        return 'otp';
    }

    public function resendOtp()
    {
        return 'resendOtp';
    }

    public function token()
    {
        return 'token';
    }

    public function checkToken()
    {
        return 'checkToken';
    }

    //
}
