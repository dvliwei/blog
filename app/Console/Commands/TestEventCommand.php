<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestEventCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pusher:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'pusher test';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $content = '这是一封来自Laravel的测试邮件.';
        $toMail  = 'liwei1987821@126.com';
        Mail::raw($content, function ($message) use ($toMail) {
            $message->subject('[ 测试 ] 测试邮件SendMail - ' .date('Y-m-d H:i:s'));
            $message->to($toMail);
        });

//        Mail::send('mails.welcome', ['key'=>'value'], function($message){
//            $message->to('liwei1987821@126.com','Mora')->subject('Welcome !');
//        });

//        $pusher = \Illuminate\Support\Facades\App::make('pusher');
//        $pusher->trigger( 'my-channel',
//            'my-event',
//            ['text' => 'I Love China!!!']
//        );
    }
}
