<?php
declare(strict_types = 1);

namespace App\Data;

class Cities
{
    private array $cities = [];
    
    public function getCities(): array
    {
        return $this->cities;
    }
    
    public function addCity(City $city): void
    {
        $this->cities[] = $city;
    }
    
    public function isEmpty(): bool
    {
        return empty($this->cities);
    }
}