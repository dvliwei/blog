<?php

namespace App\Console\Commands\LivePlay;

use App\Repositories\LivePlay\KoraextraRepository;
use Illuminate\Console\Command;

class KoraextraCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parsing:koraextra {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '解析koraextra直播视频网站 命令参数 parsing:koraextra  {url?}';

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
    public function handle(KoraextraRepository $koraextraRepository)
    {
        if(empty($this->argument('url'))){
            Log::error('url不可以为空!');
            echo "url不可以为空! \n";
            exit;
        }
        $this->webUrl = $this->argument('url');
        $playUrl = $koraextraRepository->extractForScript($this->webUrl);
        dd($playUrl);
    }
}
