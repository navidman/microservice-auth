<?php

namespace App\Observers;

use App\Models\User;
use App\Jobs\NotificationJob;

class UserObserver
{
    public function created(User $user)
    {
        try {
            dispatch(new NotificationJob($user, $user->getChanges(), 'store'));
        } catch (\Exception $exception) {

        }
    }

    public function updated(User $user)
    {
        try {
            dispatch(new NotificationJob($user, $user->getChanges(), 'update'));
        } catch (\Exception $exception) {

        }
    }

    public function deleted(User $user)
    {
        try {
            dispatch(new NotificationJob($user, $user->getChanges(), 'delete'));
        } catch (\Exception $exception) {

        }
    }

    public function restored(User $user)
    {
        try {
            dispatch(new NotificationJob($user, $user->getChanges(), 'restore'));
        } catch (\Exception $exception) {

        }
    }

    public function forceDeleted(User $user)
    {
        try {
            dispatch(new NotificationJob($user, $user->getChanges(), 'forceDelete'));
        } catch (\Exception $exception) {

        }
    }
}
