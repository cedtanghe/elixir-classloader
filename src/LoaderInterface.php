<?php

namespace Elixir\ClassLoader;

/**
 * @author Cédric Tanghe <ced.tanghe@gmail.com>
 */
interface LoaderInterface 
{
    /**
     * @param boolean $prepend
     */
    public function register($prepend = false);
    
    /**
     * @return void
     */
    public function unregister();

    /**
     * @param string $className
     * @return boolean
     */
    public function classExist($className);
    
    /**
     * @param string $className
     * @return string|null
     */
    public function findClass($className);
    
    /**
     * @param string $className
     * @return boolean
     */
    public function loadClass($className);
}
