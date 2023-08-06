<?php
declare(strict_types = 1);

namespace App\Data;

class City
{
    public function __construct(private readonly string $resource)
    {}
    
    public function getResource(): string
    {
        return $this->resource;
    }
}