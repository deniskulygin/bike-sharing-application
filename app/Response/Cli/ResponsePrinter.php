<?php
declare(strict_types = 1);

namespace App\Response\Cli;

class ResponsePrinter
{
    public static function print(array $data, string $delimiter = ': '): void
    {
        foreach ($data as $key => $value) {
            echo $key . $delimiter . $value . PHP_EOL;
        }
        
        echo PHP_EOL;
    }
}
