<?php
declare(strict_types = 1);

namespace App\Data;

class FindStationInput
{
    public function __construct(public string $city)
    {}
    
    public function getCity(): string
    {
        return $this->city;
    }
}
