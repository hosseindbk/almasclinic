<?php

namespace App\Notifications;

use App\Notifications\Channels\GhasedaksetChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class SendTimeset extends Notification
{

    use Queueable;

    public $phone;
    public $dateset;
    public $timeset;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($phone , $dateset , $timeset)
    {
        $this->phone    = $phone;
        $this->dateset  = $dateset;
        $this->timeset  = $timeset;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [GhasedaksetChannel::class];
    }


    public function toGhasedakSms($notifiable)
    {
        return [
            //'text' => " کاربر گرامی {$this->name} درخواست نوبت دهی شما توسط کارشناسان تایید و نوبت شما مورخ {$this->dateset} ساعت {$this->timeset} می باشد.\n کلینیک زیبایی الماس \n دکتر غلامرضا کریمی \n almasbeaty.com",
            'phone' => $this->phone,
            'dateset' => $this->dateset,
            'timeset' => $this->timeset
        ];
    }
}
