<?php
declare(strict_types = 1);

namespace App;

use App\Service\StationFinder;

final class Kernel
{
    /**
     * @throws \Exception
     */
    public function handle(): void
    {
        (new StationFinder())->handle();
    }
}
