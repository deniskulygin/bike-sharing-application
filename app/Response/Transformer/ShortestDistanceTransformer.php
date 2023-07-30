<?php
declare(strict_types = 1);

namespace App\Response\Transformer;

use App\Data\ShortestDistance;

class ShortestDistanceTransformer
{
    public static function transform(ShortestDistance $shortestDistance): array
    {
        return [
            'distance'        => $shortestDistance->getDistance(),
            'name'            => $shortestDistance->getName(),
            'free_bike_count' => $shortestDistance->getFreeBikeCount(),
            'biker_count'     => $shortestDistance->getBikerCount(),
        ];
    }
}