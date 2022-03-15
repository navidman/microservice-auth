<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function storeUser($data);
    public function getUserByMobile($mobile);
    public function storeOtpOnUser($user);

}
