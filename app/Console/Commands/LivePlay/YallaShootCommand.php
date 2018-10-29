<?php

namespace App\Console\Commands\LivePlay;

use App\Repositories\LivePlay\YallaShootRepository;
use Illuminate\Console\Command;
use Log;
class YallaShootCommand extends Command
{
    /**
     * The name and signature of the console command.
     * 命令以及参数
     * @var string
     */
    protected $signature = 'parsing:yallshoot {url?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '解析yallshoot直播视频网站 命令参数 parsing:yallshoot  {url?}';

    protected $webUrl;
    /**
     * Create a new command instance.
     * argument 方法不可以写在 构造函数中
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
    public function handle(YallaShootRepository $yallaShootRepository)
    {
        if(empty($this->argument('url'))){
            Log::error('url不可以为空!');
            echo "url不可以为空! \n";
            exit;
        }
        $this->webUrl = $this->argument('url');
        $playUrl = $yallaShootRepository->extractForScript($this->webUrl);
        dd($playUrl);
    }
}
