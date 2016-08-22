<?php

namespace Elixir\ClassLoader;

/**
 * @author Cédric Tanghe <ced.tanghe@gmail.com>
 */
interface LoaderInterface
{
    /**
     * @param bool $prepend
     */
    public function register($prepend = false);

    public function unregister();

    /**
     * @param string $className
     *
     * @return bool
     */
    public function classExist($className);

    /**
     * @param string $className
     *
     * @return string|null
     */
    public function findClass($className);

    /**
     * @param string $className
     *
     * @return bool
     */
    public function loadClass($className);
}
