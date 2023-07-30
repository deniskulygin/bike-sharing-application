<?php
declare(strict_types = 1);

namespace App\Service;

use App\Data\BikersInfo;
use App\Parser\BikersParserFactory;
use App\Retriever\BikersConfigRetriever;

class BikersInfoService
{
    private BikersParserFactory $bikersParserFactory;
    
    public function __construct()
    {
        $this->bikersParserFactory = new BikersParserFactory();
    }
    
    /**
     * @return BikersInfo
     * @throws \Exception
     */
    public function getBikersInfo(): BikersInfo
    {
        $path = $this->getRootBikersSourcePath();
        $parser = $this->bikersParserFactory->createParser(pathinfo($path, PATHINFO_EXTENSION));
        
        return $parser->parse($path);
    }
    
    /**
     * @return string
     * @throws \Exception
     */
    private function getRootBikersSourcePath(): string
    {
        return ROOT_DIR . BikersConfigRetriever::getBikersSource();
    }
}