<?php

namespace Elixir\ClassLoader;

require_once 'LoaderAbstract.php';
require_once 'CacheableTrait.php';

use Elixir\ClassLoader\CacheableTrait;
use Elixir\ClassLoader\LoaderAbstract;

/**
 * @author Cédric Tanghe <ced.tanghe@gmail.com>
 */
class PSR4 extends LoaderAbstract 
{
    use CacheableTrait;
    
    public function __construct() 
    {
        $basePath = sprintf(
            '%s%s..%s..%s..%s',
            __DIR__, 
            DIRECTORY_SEPARATOR, 
            DIRECTORY_SEPARATOR, 
            DIRECTORY_SEPARATOR, 
            DIRECTORY_SEPARATOR
        );
        
        $this->addNamespace('Elixir', $basePath . 'framework' . DIRECTORY_SEPARATOR . 'Elixir');
        $this->addNamespace('Elixir\Module', $basePath . 'modules');
    }
    
    /**
     * {@inheritdoc}
     */
    protected function paths($className)
    {
        $baseDirs = [''];
        $last = '';
        $class = ltrim($className, '\\');
        
        foreach ($this->prefixes as $key => $value)
        {
            $len = strlen($key);
            
            if (strncmp($className, $key, $len) === 0)
            {
                if (strcmp($key, $last) > 0)
                {
                    $last = $key;

                    $baseDirs = $value;
                    $class = substr($className, $len + 1);
                    
                    if(false === strpos($class, '\\'))
                    {
                        break;
                    }
                }
            }
        }

        $paths = [];

        foreach ($baseDirs as $dir)
        {
            $paths[] = rtrim($dir, '/\\') . 
                       DIRECTORY_SEPARATOR . 
                       str_replace('\\', DIRECTORY_SEPARATOR, $class) . 
                       '.php';
        }

        return $paths;
    }
}
