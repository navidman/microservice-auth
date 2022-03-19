<?php

namespace App\Observers;

use App\Models\User;
use App\Jobs\NotificationJob;

class UserObserver
{
    public function created(User $user)
    {
        try {
            dispatch(new NotificationJob($user->getDirty(), 'create'));
        } catch (\Exception $exception) {

        }
    }

    public function updated(User $user)
    {
        try {
            dispatch(new NotificationJob($user->getDirty(), 'update'));
        } catch (\Exception $exception) {

        }
    }

    public function deleted(User $user)
    {
        try {
            dispatch(new NotificationJob($user->getDirty(), 'delete'));
        } catch (\Exception $exception) {

        }
    }

    public function restored(User $user)
    {
        try {
            dispatch(new NotificationJob($user->getDirty(), 'restore'));
        } catch (\Exception $exception) {

        }
    }

    public function forceDeleted(User $user)
    {
        try {
            dispatch(new NotificationJob($user->getDirty(), 'forceDelete'));
        } catch (\Exception $exception) {

        }
    }
}
