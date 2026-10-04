<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Multiply extends Command
{
    protected $signature = 'multiply {a} {b}';

    protected $description = 'Множить два числа';

    public function handle(): int
    {
        $a = (int) $this->argument('a');
        $b = (int) $this->argument('b');

        $result = $a * $b;

        $this->info("Результат: {$a} × {$b} = {$result}");

        return self::SUCCESS;
    }
}
