<?php

namespace App\Console\Commands;

use App\Contracts\CatalogRepository;
use Illuminate\Console\Command;

final class InspectLabArchitecture extends Command
{
    protected $signature = 'lab:inspect';

    protected $description = 'Shows LR2 architecture diagnostics';

    public function handle(): int
    {
        $this->info('LR2 architecture inspection');
        $this->table(['Key', 'Value'], [
            ['Student', config('lab2.student')],
            ['Variant', config('lab2.variant')],
            ['Route prefix', config('lab2.route_prefix')],
            ['Repository', app(CatalogRepository::class)::class],
            ['Environment', app()->environment()],
        ]);

        return self::SUCCESS;
    }
}
