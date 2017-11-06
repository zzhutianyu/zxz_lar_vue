<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GitPull extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'git:pull';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '获取最新的仓库代码';

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
            $basePath = base_path();
            exec("cd $basePath\ngit pull", $output);
            echo nl2br(implode($output, "\n"));
    }
}
