<?php

namespace App\Console\Commands;

use App\Services\JobsService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class JobsUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jobs:checker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Jobs of expired or ready to publish';

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
    public function handle(JobsService $jobsService)
    {
        $this->info('Run Job checker');
        Log::info('Run Job checker');

//        dd(date('Y-m-d H:i'));
        $jobsService->checkForPublishingJobs();
        $jobsService->checkForExpiringJobs();

        $this->info('Success Job checker');
        Log::info('Success Job checker');

    }
}
