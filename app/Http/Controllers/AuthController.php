<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Authentication\Authentication;
use Firebase\JWT\JWT;
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
        return Authentication::navid();
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
        return response(null, Response::HTTP_OK);
    }

}
