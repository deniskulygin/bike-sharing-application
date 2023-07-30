<?php
declare(strict_types = 1);

namespace App\Data;

class Station
{
    private readonly string $name;
    private readonly float $latitude;
    private readonly float $longitude;
    private readonly int $freeBikes;
    
    public function __construct(string $name, float $latitude, float $longitude, int $freeBikes)
    {
        $this->name = $name;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->freeBikes = $freeBikes;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
    
    public function getLatitude(): float
    {
        return $this->latitude;
    }
    
    public function getLongitude(): float
    {
        return $this->longitude;
    }
    
    public function getFreeBikes(): int
    {
        return $this->freeBikes;
    }
}
