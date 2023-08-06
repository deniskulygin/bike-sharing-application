<?php
declare(strict_types = 1);

namespace App\Manager;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use App\Exception\UnsuccessfulRequestException;
use App\Retriever\ApiConfigRetriever;

class ApiManager
{
    protected static self|null $instance = null;

    final protected function __clone() { }
    
    /**
     * @throws \Exception
     */
    final public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }

    final protected function __construct(
        private readonly Client $client = new Client())
    {}
    
    /**
     * @return array
     * @throws UnsuccessfulRequestException
     * @throws \Exception
     */
    public function getAllBikeSpots(): array
    {
        $response = $this->makeGetRequest(
            ApiConfigRetriever::getHost() . ApiConfigRetriever::getBikeSpotsResource()
        );
        
        if (200 !== $response->getStatusCode()) {
            throw new UnsuccessfulRequestException('Request to get all bike stations is unsuccessful');
        }
        
        return json_decode($response->getBody()->getContents(), true);
    }
    
    /**
     * @param string $cityResource
     *
     * @return array
     * @throws UnsuccessfulRequestException
     * @throws \Exception
     */
    public function getCityBikeStations(string $cityResource): array
    {
        $response = $this->makeGetRequest(ApiConfigRetriever::getHost() . $cityResource);
        
        if (200 !== $response->getStatusCode()) {
            throw new UnsuccessfulRequestException('Request to get сшен bike stations is unsuccessful');
        }
        
        return json_decode($response->getBody()->getContents(), true);
    }
    
    private function makeGetRequest(string $uri): ResponseInterface
    {
        try {
            $result = $this->client->request('GET', $uri);
        } catch (GuzzleException) {
            throw new \LogicException('Unable to load all bike stations');
        }
        
        return $result;
    }
    
    public static function getInstance(): static
    {
        if (static::$instance === null) {
            static::$instance = new static;
        }
        
        return static::$instance;
    }
}
