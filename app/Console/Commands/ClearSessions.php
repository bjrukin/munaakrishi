<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ClearSessions extends Command {
    protected $signature   = 'sessions:clear';
    protected $description = 'Delete all session files';

    public function handle() {

        $path = storage_path('framework/sessions');
        File::cleanDirectory($path);
        $this->info('All session files deleted successfully.');

    }
}
