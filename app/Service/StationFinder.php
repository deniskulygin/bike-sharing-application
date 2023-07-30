<?php
declare(strict_types = 1);

namespace App\Service;

use App\Data\ShortestDistance;
use App\Exception\UnsuccessfulRequestException;
use App\Manager\ApiManager;
use App\Mapper\CitiesDataMapper;
use App\Parser\FindStationInputParser;
use App\Response\Cli\ResponsePrinter;
use App\Response\Transformer\ShortestDistanceTransformer;

class StationFinder
{
    /**
     * @throws UnsuccessfulRequestException
     * @throws \Exception
     */
    public function handle(): void
    {
        $input = FindStationInputParser::getInput();
        
        $allBikeStations = ApiManager::getInstance()->getAllBikeSpots();
        $cities = CitiesDataMapper::map($allBikeStations, $input->getCity());
        
        $stations = (new StationService())->getCityStations($cities);
        $bikersInfo = (new BikersInfoService())->getBikersInfo();
        $shortestDistances = (new DistanceService())->getShortestDistances($bikersInfo, $stations);

        /** @var ShortestDistance $distance */
        foreach ($shortestDistances->getShortestDistances() as $distance) {
            ResponsePrinter::print(ShortestDistanceTransformer::transform($distance));
        }
    }
}
