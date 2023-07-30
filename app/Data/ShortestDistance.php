<?php
declare(strict_types = 1);

namespace App\Data;

class ShortestDistance
{
    private readonly string $name;
    private readonly float $distance;
    private readonly int $freeBikeCount;
    private readonly int $bikerCount;
    
    public function __construct(string $name, float $distance, int $freeBikeCount, int $bikerCount)
    {
        $this->name = $name;
        $this->distance = $distance;
        $this->freeBikeCount = $freeBikeCount;
        $this->bikerCount = $bikerCount;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
    
    public function getDistance(): float
    {
        return $this->distance;
    }
    
    public function getFreeBikeCount(): int
    {
        return $this->freeBikeCount;
    }
    
    public function getBikerCount(): int
    {
        return $this->bikerCount;
    }
}
