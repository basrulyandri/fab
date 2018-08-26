<?php

namespace App\Listeners;

use App\Events\FormDownloadBrosurEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendEmailToUsers
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
        if($aplikan->tanggal_take != NULL){
            $user = $aplikan->presenter;
            $pimpinan = \DB::table('users')->select('email')->whereRoleId(6)->get()->pluck('email')->all();
            //dd($pimpinan);
            //email ke presenter
            Mail::send('layouts.emails.notificationdownloadrosurtopresenter',compact(['aplikan']),function($message) use ($user,$aplikan){
                $message->from(getOption('email_from'),getOption('email_from_label'))
                        ->to($user->email)                    
                        ->subject('Aplikanmu baru saja mendownload brosur ('.$aplikan->nama.')');
            });

            //notif email ke pimpinan
            Mail::send('layouts.emails.notificationdownloadrosurtousers',compact(['aplikan']),function($message) use ($pimpinan,$aplikan,$user){
                $message->from(getOption('email_from'),getOption('email_from_label'))
                        ->to($pimpinan)                    
                        ->subject('Aplikan referensi dari '.$user->first_name.' baru saja mendownload brosur');
            });
        } else {
            $users = unserialize(getOption('list_user_notifikasi_dowload_brosur'));
            Mail::send('layouts.emails.notificationdownloadrosurtousers',compact(['aplikan']),function($message) use ($users,$aplikan){
                $message->from(getOption('email_from'),getOption('email_from_label'))
                        ->to($users)                    
                        ->subject(getOption('subject_email_notification_download_brosur_to_user').' ('.$aplikan->nama.')');
            });            
        }
    }
}
