<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateToken extends Command
{
    protected $signature = 'token:generate';
    protected $description = 'Generate a random token';

    public function handle(): void
    {
        $token = Str::random(60);
        $this->info("Generated token: $token");
    }
}
