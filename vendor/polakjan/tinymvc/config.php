<?php

namespace polakjan\tinymvc;

class config
{
    // the configuration
    protected static $config = [];

    /**
     * loads the configuration from one configuration file
     */
    protected static function loadConfig($name)
    {
        if(!isset(static::$config[$name]))
        {
            // initialize $config as empty array
            $config = [];

            // use the defined constant or try to figure the folder out
            $config_dir = defined('CONFIG_DIR') ? CONFIG_DIR : __DIR__.'/../../../config';
            
            // include the file with configuration for this
            // config family $name
            include $config_dir . '/' . $name . '.php';

            // save the retrieved configuration into the
            // static configuration under the key $name
            static::$config[$name] = $config;
        }
    }

    /**
     * returns a configuration value or the value of $default
     */
    public static function get($key, $default = null)
    {
        $file_key = explode('.', $key);
        $config_file = $file_key[0];
        $config_key = $file_key[1];

        static::loadConfig($config_file);

        if(array_key_exists($config_key, static::$config[$config_file]))
        {
            return static::$config[$config_file][$config_key];
        }
        else
        {
            return $default;
        }
    }
}