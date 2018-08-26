<?php

namespace App\Listeners;

use App\Events\FormDownloadBrosurEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendEmailToAplikan
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  FormDownloadBrosurEvent  $event
     * @return void
     */
    public function handle(FormDownloadBrosurEvent $event)
    {
        $aplikan = $event->aplikan;
        Mail::send('layouts.emails.notificationdownloadrosurtoaplikan',compact(['aplikan']),function($message) use ($aplikan){
            $message->from(getOption('email_from'),getOption('email_from_label'))
                    ->to($aplikan->email)                    
                    ->subject(getOption('subject_email_notification_download_brosur_to_aplikan'))
                    ->attach(public_path(getOption('file_brosur')));
        });
    }
}
