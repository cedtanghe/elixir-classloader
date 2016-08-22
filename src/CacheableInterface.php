<?php

namespace Elixir\ClassLoader;

/**
 * @author Cédric Tanghe <ced.tanghe@gmail.com>
 */
interface CacheableInterface
{
    /**
     * @var string
     */
    const DEFAULT_CACHE_KEY = '__CACHE_LOADER__';

    /**
     * @param array|\ArrayAccess  $cache
     * @param string|numeric|null $version
     * @param string              $key
     *
     * @return bool
     */
    public function loadFromCache($cache, $version = null, $key = self::DEFAULT_CACHE_KEY);

    /**
     * @return bool
     */
    public function cacheLoaded();

    /**
     * @return bool
     */
    public function isFreshCache();

    /**
     * @return bool
     */
    public function exportToCache();

    /**
     * @return bool
     */
    public function invalidateCache();
}
