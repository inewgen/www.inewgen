<?php

use App\Repositories\CachedRepository;

class BannersRepository implements BannersRepositoryInterface
{

    public function __construct(CachedRepository $cachedRepository)
    {
        $this->cachedRepository = $cachedRepository;
        $this->pathcache = 'web.0.banners';
    }

    public function get($parameters)
    {
        $keycache = getKeyCache($this->pathcache . '.get', $parameters);

        // Get cache
        $response = $this->cachedRepository->get($keycache);
        if ($response) {
            return $response;
        }

        if (isset($_GET['nocache'])) {
            $parameters['nocache'] = $_GET['nocache'];
        }

        $client   = new Client(Config::get('url.inewgen-api'));
        $results  = $client->get('banners', $parameters);
        $response = json_decode($results, true);

        // Save cache
        $this->cachedRepository->put($keycache, $response);

        return $response;
    }
}
