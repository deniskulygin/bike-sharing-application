<?php
declare(strict_types = 1);

namespace App\Parser;

use App\Data\FindStationInput;

class FindStationInputParser
{
    public static function getInput(): FindStationInput
    {
        if (false === isset($_SERVER['argv'][1]) || false === is_string($_SERVER['argv'][1])) {
            throw new \LogicException('City is required!');
        }
        
        return new FindStationInput($_SERVER['argv'][1]);
    }
}
