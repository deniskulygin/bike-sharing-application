<?php
declare(strict_types = 1);

namespace App\Data;

class City
{
    private readonly string $resource;
    
    public function __construct(string $resource)
    {
        $this->resource = $resource;
    }
    
    public function getResource(): string
    {
        return $this->resource;
    }
}