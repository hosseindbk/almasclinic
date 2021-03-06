<?php


namespace App\Notifications\Channels;


use Ghasedak\Exceptions\ApiException;
use Ghasedak\Exceptions\HttpException;
use Ghasedak\GhasedakApi;
use Illuminate\Notifications\Notification;

class GhasedaksetChannel
{
    public function send($notifiable , Notification $notification)
    {
        if(! method_exists($notification , 'toGhasedakSms')) {
            throw new \Exception('toGhasedakSms not found');
        }

        $data = $notification->toGhasedakSms($notifiable);

        $receptor = $data['phone'];
        $dateset = $data['dateset'];
        $timeset = $data['timeset'];
        $apiKey = config('services.ghasedak.key');

        try
        {
            $api = new GhasedakApi($apiKey);
            $api->Verify($receptor,1,'almasbeautysuccess',$dateset,$timeset);

        }
        catch(ApiException $e){
            throw $e;
        }
        catch(HttpException $e){
            throw $e;
        }
    }
}
