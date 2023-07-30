<?php
declare(strict_types = 1);

namespace App\Data;

class ShortestDistances
{
    private array $shortestDistances = [];
    
    public function getShortestDistances(): array
    {
        return $this->shortestDistances;
    }
    
    public function addShortestDistance(ShortestDistance $shortestDistance): void
    {
        $this->shortestDistances[] = $shortestDistance;
    }
    
    public function isEmpty(): bool
    {
        return empty($this->shortestDistances);
    }
}
