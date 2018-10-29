<?php

namespace App\Console\Commands\LivePlay;

use App\Repositories\LivePlay\ArabicLiveRepository;
use Illuminate\Console\Command;

class ArabicLiveCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parsing:arabiclive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '解析arabicLive app的所有频道播放地址';

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
    public function handle(ArabicLiveRepository $arabicLiveRepository)
    {
        $playUrl = $arabicLiveRepository->extractForScript();
        dd($playUrl);
    }
}
