<?php

namespace App\Checkers;

use GuzzleHttp\Client;
use Illuminate\Console\Scheduling\Event;
use Pbmedia\ApiHealth\Checkers\AbstractHttpChecker;

class LaravelDocumentationChecker extends AbstractHttpChecker
{
    /*
     * The URL you want to request.
     */
    protected $url = 'https://ipayeasy-api.myeg.com.my/api/ipayeasy/1.0/utils/otp';

    /*
     * The method you want to use.
     */
    protected $method = 'OPTIONS';

    /*
     * Here you can specify the Guzzle HTTP options.
     *
     * @return \Pbmedia\ApiHealth\Checkers\AbstractHttpChecker
     */
    public static function create()
    {
        return new static(new Client, [
            'headers' => [
                'Authorization'=> ['Bearer 94762509-b05b-31c4-a6d6-2e555667b9a7']
            ]

            ]);
    }

    /**
     * Defines the checker's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Event  $event
     * @return null
     */
    public function schedule(Event $event)
    {
        $event->everyMinute();

        // $event->evenInMaintenanceMode();
        // $event->onOneServer();
    }
}
