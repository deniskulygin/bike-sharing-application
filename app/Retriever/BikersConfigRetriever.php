<?php
declare(strict_types = 1);

namespace App\Retriever;

class BikersConfigRetriever
{
    /**
     * @return string
     * @throws \Exception
     */
    public static function getBikersSource(): string
    {
        return BaseConfigRetriever::getByName('BIKERS_SOURCE');
    }
}
