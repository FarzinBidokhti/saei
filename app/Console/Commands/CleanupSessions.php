<?php

namespace App\Console\Commands;

use App\Models\LoginLog;
use Illuminate\Console\Command;

class CleanupSessions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cleanup-sessions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cleanup Session';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expired = LoginLog::whereNull('logout_at')
            ->where('login_at', '<', now()->subMinutes(30))
            ->update([
                'logout_at'   => now(),
                'description' => 'انقضاء خودکار جلسه بعد از 30 دقیقه'
            ]);

        $this->info("Expired sessions closed: " . $expired);
    }
}
