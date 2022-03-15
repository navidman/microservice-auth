<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    private $user_repository;

    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function index()
    {
        $mobile = '09139071587';
        return $this->user_repository->getUserByMobile($mobile);
    }

    public function otp(Request $request)
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
