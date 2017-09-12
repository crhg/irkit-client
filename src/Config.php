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


}