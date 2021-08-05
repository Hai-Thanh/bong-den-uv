<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;



class PersonLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'person:log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sơn Lê Duy đã tạo log bằng schedule';

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
     * @return int
     */
    public function handle()
    {
      
        Log::info("ghi  log bằng command");
        return 0;
    }
}
