<?php
declare(strict_types = 1);

namespace App\Mapper;

use App\Data\Cities;
use App\Data\City;

class CitiesDataMapper
{
    public static function map(array $data, string $city): Cities
    {
        $cities = new Cities();
        
        foreach ($data['networks'] as $network) {
            if ($network['location']['city'] == $city)
                $cities->addCity(new City($network['href']));
        }
        
        return $cities;
    }
}
