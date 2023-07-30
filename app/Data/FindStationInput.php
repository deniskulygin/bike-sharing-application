<?php
declare(strict_types = 1);

namespace App\Data;

class FindStationInput
{
    private readonly string $city;
    
    public function __construct(string $city)
    {
        $this->city = $city;
    }
    
    public function getCity(): string
    {
        return $this->city;
    }
}
