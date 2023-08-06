<?php
declare(strict_types = 1);

namespace App\Parser;

class BikersParserFactory
{
    public function createParser(string $format): BikersParserInterface
    {
        return match ($format) {
            'csv' => new CsvBikersParser(),
            default => throw new \LogicException('Unsupported bikers source file'),
        };
    }
}
