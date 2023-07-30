<?php
declare(strict_types = 1);

namespace App\Retriever;

use Dotenv\Dotenv;

class BaseConfigRetriever
{
    /**
     * @throws \Exception
     */
    final public static function getByName(string $name): string
    {
        $config = Dotenv::createMutable(ROOT_DIR)->load();
        if (true === empty($config)) {
            throw new \Exception('env variables are not set');
        }
        
        if (false === isset($config[$name])) {
            throw new \Exception(sprintf('Config %s not exist', $name));
        }
        
        return $config[$name];
    }
}
