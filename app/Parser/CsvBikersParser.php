<?php
declare(strict_types = 1);

namespace App\Parser;

use App\Data\BikerInfo;
use App\Data\BikersInfo;

class CsvBikersParser implements BikersParserInterface
{
    public function parse(string $filePath): BikersInfo
    {
        $bikers = new BikersInfo();
        
        foreach ($this->csvDataGenerator($filePath) as $data) {
            try {
                $bikers->addBiker(new BikerInfo((int) $data[0], (float) $data[1], (float) $data[2]));
            } catch (\Throwable) {
                throw new \LogicException('No bikers data provided');
            }
        }
        
        return $bikers;
    }

    public function csvDataGenerator(string $filePath): \Generator
    {
        $row = 0;
        $handle = fopen($filePath, 'r');
        
        if ($handle === false) {
            throw new \LogicException('Cannot open a file');
        }
        
        try {
            while (($data = fgetcsv($handle, 100, ',')) !== false) {
                if ($row === 0) {
                    $row++;
                    
                    continue;
                }
                
                yield $data;
            }
        } finally {
            fclose($handle);
        }
    }
}
