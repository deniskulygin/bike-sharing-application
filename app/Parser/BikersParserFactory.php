<?php
declare(strict_types = 1);

namespace App\Parser;

class BikersParserFactory
{
    public function createParser(string $format): BikersParserInterface
    {
        if ($format === 'csv') {
            $parser = new CsvBikersParser();
        } else {
            throw new \LogicException('Unsupported bikers source file');
        }
        
        return $parser;
    }
}
