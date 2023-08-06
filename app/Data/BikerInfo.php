<?php
declare(strict_types = 1);

namespace App\Data;

class BikerInfo
{
    public function __construct(
        private readonly int $count,
        private readonly float $latitude,
        private readonly float $longitude
    ) {}
    
    public function getCount(): int
    {
        return $this->count;
    }
    
    public function getLongitude(): float
    {
        return $this->longitude;
    }
    
    public function getLatitude(): float
    {
        return $this->latitude;
    }
}