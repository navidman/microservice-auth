<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Database\Eloquent\Model;

class NotificationJob extends Job
{
    private $method;
    private $changes;

    public function __construct($changes, $method)
    {
        $this->onQueue('notification');
        $this->method = $method;
        $this->changes = $changes;
    }

    public function handle()
    {
        try {
            $changes = $this->changes;

            switch ($this->method) {
                case 'store':
                    return $changes;
                    break;
                case 'update':
                    return $changes;
                    break;
                case 'delete':
                    break;
                case 'restore':
                    break;
                case 'forceDelete':
                    break;
            }
        } catch (\Exception $exception) {

        }
    }
}
