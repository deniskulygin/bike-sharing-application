<?php
declare(strict_types = 1);

namespace App\Data;

class BikersInfo
{
    private array $bikersInfo = [];
    
    public function getBikersInfo(): array
    {
        return $this->bikersInfo;
    }
    
    public function addBiker(BikerInfo $bikerInfo): void
    {
        $this->bikersInfo[] = $bikerInfo;
    }
    
    public function isEmpty(): bool
    {
        return empty($this->bikersInfo);
    }
}