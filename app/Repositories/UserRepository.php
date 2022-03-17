<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Carbon\Carbon;

class UserRepository implements UserRepositoryInterface
{
    public function storeUser($data)
    {
        return User::create([
            'mobile' => $data['mobile'],
            'otp' => rand(100000, 999999),
            'otp_expired_at' => Carbon::now()->addMinutes(2)->format('Y-m-d H:i:s')
        ]);
    }

    public function getUserByMobile($mobile)
    {
        return User::whereMobile($mobile)->first();
    }

    public function storeOtpOnUser($user)
    {
        return $user->update([
            'otp' => rand(100000, 999999),
            'otp_expired_at' => Carbon::now()->addMinutes(2)->format('Y-m-d H:i:s')
        ]);
    }
}
