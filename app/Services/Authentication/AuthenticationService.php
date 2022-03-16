<?php

namespace App\Services\Authentication;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Firebase\JWT\JWT;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class AuthenticationService

{
    private $user_repository;

    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function navid() {
        return 1;
    }

    public function sendOtp($request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => ['required', 'min:11', 'max:11', 'regex:/(09)[0-9]{9}/'],
            'type' => ['nullable', 'boolean']
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }
        if ($request->type) {
            $data = [
                'mobile' => $request->mobile,
            ];
            $user = $this->user_repository->storeUser($data);
            if (!config('app.debug')) {

                $this->user_repository->storeOtpOnUser($user);
            }

            return response(null, Response::HTTP_OK);
        } else {
            $user = $this->user_repository->getUserByMobile($request->mobile);
            if (!$user) {
                $validator->errors()->add('mobile', 'شماره همراه وارد شده یافت نشد');
                return response(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
            } else {
                if (config('app.debug')) {
                    $this->user_repository->storeOtpOnUser($user);
                }
                return response(null, Response::HTTP_OK);
            }
        }
    }

    public function resendOtp($request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => ['required', 'min:11', 'max:11', 'regex:/(09)[0-9]{9}/'],
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }

        $user = $this->user_repository->getUserByMobile($request->mobile);

        if (!$user) {
            $validator->errors()->add('mobile', 'شماره همراه وارد شده یافت نشد');
            return response(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        } else {
            if (!config('app.debug')) {
                $this->user_repository->storeOtpOnUser($user);
            }

            return response(null, Response::HTTP_OK);
        }
    }

    public function generateToken($request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => ['required', 'min:11', 'max:11', 'regex:/(09)[0-9]{9}/'],
            'otp' => ['required', 'min:6', 'max:6'],
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }
        $user = $this->user_repository->getUserByMobile($request->mobile);

        if (!$user) {
            $validator->errors()->add('mobile', 'شماره همراه وارد شده یافت نشد');

            return response(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }
        if (config('app.debug') or $user->checkOtp($request->otp)) {

            $expires_in = \Carbon\Carbon::now()->addDays(config('jwt.token_lifetime'));
            $token = JWT::encode(['fake' => $request->otp, 'user' => $user, 'expires_in' => $expires_in], config('jwt.jwt_secret'), config('jwt.jwt_algorithm') );

            $tokenInfo = collect(['jwt_token' => $token]);

            if ($tokenInfo->has('error')) {
                return response('Unauthorized.', Response::HTTP_UNAUTHORIZED);
            }
            $user_info = [
                'mobile' => $user->mobile,
                'created_at' => $user->created_at,
            ];
            $tokenInfo['user'] = $user_info;
            return response($tokenInfo, Response::HTTP_OK);
        } else {
            $validator->errors()->add('otp', 'کد وارد شده معتبر نمی باشد');
            return response(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }
    }

}
