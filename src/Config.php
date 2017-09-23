<?php
/**
 * Created by PhpStorm.
 * User: matsui
 * Date: 2017/09/09
 * Time: 13:52
 */

namespace Crhg\IRKit;

class Config
{
    /**
     * @var
     */
    protected $config;

    /**
     * Config constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function get($key, $default = null)
    {
        try {
            return $this->getOrFail($key);
        } catch (\Exception $e) {
            return $default;
        }
    }

    public function getOrFail($key) {
        $result = $this->config;
        foreach (explode('.', $key) as $k) {
            if (!array_key_exists($k, $result)) {
                throw new \Exception("key not found: $key");
            }
            $result = $result[$k];
        }
        return $result;
    }


}