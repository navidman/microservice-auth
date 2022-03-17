<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Database\Eloquent\Model;

class NotificationJob extends Job
{
    private $model;
    private $method;
    private $changes;

    public function __construct(Model $model, $changes, $method)
    {
        $this->onQueue('notification');
        $this->model = $model;
        $this->method = $method;
        $this->changes = $changes;
    }

    public function handle()
    {
        try {
            $model = $this->model;
            $changes = $this->changes;

            switch ($this->method) {
                case 'store':
                    //TODO publish createdNotification
                    break;
                case 'update':
                    //TODO publish updatedNotification
                    break;
                case 'delete':
                    //TODO publish deletedNotification
                    break;
                case 'restore':
                    //TODO publish restoredNotification
                    break;
                case 'forceDelete':
                    //TODO publish forceDeletedNotification
                    break;
            }
        } catch (\Exception $exception) {

        }
    }
}
