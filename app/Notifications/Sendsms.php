<?php

namespace App\Notifications;

use App\Notifications\Channels\GhasedakreserveChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class Sendsms extends Notification
{

    use Queueable;

    public $dateset;
    public $name;
    public $phone;
    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct($dateset , $phone , $name)
    {
        $this->dateset = $dateset;
        $this->phone = $phone;
        $this->name = $name;

    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [GhasedakreserveChannel::class];
    }


    public function toGhasedakSms($notifiable)
    {
        return [
            //'text' => " کاربر گرامی {$this->name} درخواست نوبت دهی شما برای {$this->title} ثبت گردید تایید درخواست شما در اسرع وقت پیامک می گردد. \n کلینیک زیبایی الماس \n دکتر غلامرضا کریمی \n almasbeauty.com",
            'phone' => $this->phone,
            'dateset' => $this->dateset,
            'name' => $this->name
        ];
    }
}
