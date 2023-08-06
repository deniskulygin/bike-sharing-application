<?php
declare(strict_types = 1);

namespace App\Service;

use App\Data\BikerInfo;
use App\Data\BikersInfo;
use App\Data\ShortestDistance;
use App\Data\ShortestDistances;
use App\Data\Station;
use App\Data\Stations;

class DistanceService
{
    public function getShortestDistances(BikersInfo $bikersInfo, Stations $stations): ShortestDistances
    {
        $shortestDistances = new ShortestDistances();
        
        /** @var BikerInfo $bikerInfo */
        foreach ($bikersInfo->getBikersInfo() as $bikerInfo) {
            $shortestDistance = 9999999999999999;
            $closestStationName = '';
            $freeBikeCount = 0;
            $bikerCount = 0;
            /** @var Station $station */
            foreach ($stations->getStations() as $station) {
                $distance = $this->getDistance($station, $bikerInfo);
                if ($distance < $shortestDistance) {
                    $shortestDistance = $distance;
                    $closestStationName = $station->getName();
                    $freeBikeCount = $station->getFreeBikes();
                    $bikerCount = $bikerInfo->getCount();
                }
            }
            $shortestDistances->addShortestDistance(new ShortestDistance(
                name: $closestStationName,
                distance: $shortestDistance,
                freeBikeCount: $freeBikeCount,
                bikerCount: $bikerCount
            ));
        }
        
        return $shortestDistances;
    }
    
    /**
     * @param Station   $station
     * @param BikerInfo $bikerInfo
     *
     * @return float
     */
    private function getDistance(Station $station, BikerInfo $bikerInfo): float
    {
        $earth_radius = 6371;
        
        $dLat = deg2rad($bikerInfo->getLatitude() - $station->getLatitude());
        $dLon = deg2rad($bikerInfo->getLongitude() - $station->getLongitude());
        
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($station->getLatitude()))
            * cos(deg2rad($bikerInfo->getLatitude())) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c;
        
        return (float) $d;
    }
}
