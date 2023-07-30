<?php
declare(strict_types = 1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Data\BikerInfo;
use App\Data\BikersInfo;
use App\Data\ShortestDistance;
use App\Data\Station;
use App\Data\Stations;
use App\Service\DistanceService;

class DistanceCalculationTest extends TestCase
{
    public function testDistanceCalculation(): void
    {
        $distanceService = new DistanceService();
        $bikersInfo = new BikersInfo();
        $stations = new Stations();
        
        $biker1 = new BikerInfo(1, 45, 10);
        $biker2 = new BikerInfo(1, 44, 15);
        $station1 = new Station('Station 1', 45.695, 45, 3);
        $station2 = new Station('Station 2', 45.69233, 10, 1);
        $station3 = new Station('Station 3', 45.695, 13, 0);
        
        $bikersInfo->addBiker($biker1);
        $bikersInfo->addBiker($biker2);
        $stations->addStation($station1);
        $stations->addStation($station2);
        $stations->addStation($station3);
        
        $distances = $distanceService->getShortestDistances($bikersInfo, $stations);
        
        $this->assertFalse($distances->isEmpty());
        $distances = $distances->getShortestDistances();
        $this->assertCount(2, $distances);
        
        /** @var ShortestDistance $firstDistance */
        $firstDistance = $distances[0];
        $this->assertEquals('Station 2', $firstDistance->getName());
        $this->assertEquals(1, $firstDistance->getFreeBikeCount());
        $this->assertEquals(1, $firstDistance->getBikerCount());
        
        /** @var ShortestDistance $secondDistance */
        $secondDistance = $distances[1];
        $this->assertEquals('Station 3', $secondDistance->getName());
        $this->assertEquals(0, $secondDistance->getFreeBikeCount());
        $this->assertEquals(1, $secondDistance->getBikerCount());
    }
}
