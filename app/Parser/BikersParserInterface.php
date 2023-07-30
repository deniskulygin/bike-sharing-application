<?php
declare(strict_types = 1);

namespace App\Parser;

use App\Data\BikersInfo;

interface BikersParserInterface
{
    /**
     * @param string $filePath
     *
     * @return BikersInfo
     */
    public function parse(string $filePath): BikersInfo;
}
