<?php
declare(strict_types = 1);

namespace App\Data;

class Stations
{
    private array $stations = [];
    
    public function getStations(): array
    {
        return $this->stations;
    }
    
    public function addStation(Station $station): void
    {
        $this->stations[] = $station;
    }
    
    public function isEmpty(): bool
    {
        return empty($this->stations);
    }
}
