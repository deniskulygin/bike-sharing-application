<?php
declare(strict_types = 1);

namespace App\Service;

use App\Data\Cities;
use App\Data\City;
use App\Data\Station;
use App\Data\Stations;
use App\Exception\UnsuccessfulRequestException;
use App\Manager\ApiManager;

class StationService
{
    /**
     * @throws UnsuccessfulRequestException
     */
    public function getCityStations(Cities $cities): Stations
    {
        $stations = new Stations();
        
        /** @var City $city */
        foreach ($cities->getCities() as $city) {
            $cityStations = ApiManager::getInstance()->getCityBikeStations($city->getResource());
            
            foreach ($cityStations['network']['stations'] as $station) {
                $stations->addStation(
                    new Station(
                        name: $station['name'],
                        latitude: (float) $station['latitude'],
                        longitude: (float) $station['longitude'],
                        freeBikes: $station['free_bikes']
                    )
                );
            }
        }
        
        if (true === $stations->isEmpty()) {
            throw new \LogicException('There is no bike station available in the city');
        }
        
        return $stations;
    }
}
