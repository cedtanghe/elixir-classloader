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
     * @param array|\ArrayAccess $cache
     * @param string|numeric|null $version
     * @param string $key
     * @return boolean
     */
    public function loadFromCache($cache, $version = null, $key = self::DEFAULT_CACHE_KEY);
    
    /**
     * @return boolean
     */
    public function cacheLoaded();
    
    /**
     * @return boolean
     */
    public function isFreshCache();
    
    /**
     * @return boolean
     */
    public function exportToCache();
    
    /**
     * @return boolean
     */
    public function invalidateCache();
}
