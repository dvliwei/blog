<?php

namespace App\Console\Commands\LivePlay;

use App\Repositories\LivePlay\LiveNetTvRepository;
use Illuminate\Console\Command;

class LiveNetTvCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parsing:LiveNetTv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Live Net Tv 直播解析';

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
    public function handle(LiveNetTvRepository $liveNetTvRepository)
    {
        $playUrl = $liveNetTvRepository->extractForScript();
        dd($playUrl);
    }
}
