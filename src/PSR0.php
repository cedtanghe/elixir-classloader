<?php

namespace Elixir\ClassLoader;

require_once 'LoaderAbstract.php';

use Elixir\ClassLoader\LoaderAbstract;

/**
 * @author Cédric Tanghe <ced.tanghe@gmail.com>
 */
class PSR0 extends LoaderAbstract 
{
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
        
        $fileName  = '';
        $namespace = '';
        
        if ($lastNsPos = strripos($className, '\\')) 
        {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        $paths = [];

        foreach ($baseDirs as $dir)
        {
            $paths[] = rtrim($dir, '/\\') . DIRECTORY_SEPARATOR . $fileName;
        }
        
        return $paths;
    }
}
