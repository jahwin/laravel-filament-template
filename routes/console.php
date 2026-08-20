<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('server {--host=127.0.0.1} {--port=} {--tries=10} {--no-reload}', function () {
    $options = [
        '--host' => $this->option('host'),
        '--tries' => $this->option('tries'),
    ];

    if ($this->option('port')) {
        $options['--port'] = $this->option('port');
    }

    if ($this->option('no-reload')) {
        $options['--no-reload'] = true;
    }

    return $this->call('serve', $options);
})->purpose('Serve the application on the PHP development server');
