<?php
declare(strict_types = 1);

namespace App\Retriever;

class ApiConfigRetriever
{
    /**
     * @return string
     * @throws \Exception
     */
    public static function getHost(): string
    {
        return BaseConfigRetriever::getByName('HOST');
    }
    
    /**
     * @return string
     * @throws \Exception
     */
    public static function getBikeSpotsResource(): string
    {
        return BaseConfigRetriever::getByName('BIKE_STATIONS_RESOURCE');
    }
}
