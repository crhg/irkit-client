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

    /**
     * get host config object
     *
     * @param $name
     * @return Host
     * @throws \Exception
     */
    public function getHost($name)
    {
        if (!isset($this->config['host'][$name])) {
            throw new \Exception('config not found: host='.$name);
        }

        $host_config = $this->config['host'][$name];

        if (!isset($host_config['uri'])) {
            throw new \Exception('no uri: host='.$name);
        }

        $uri = $host_config['uri'];
        $http_option = $host_config['http_option'] ?? [];

        $host = new Host($uri, $http_option);

        return $host;
    }

    public function getCommand($accessory, $command)
    {
        if (!isset($this->config['accessory'][$accessory])) {
            throw new \Exception('accessory not found: '.$accessory);
        }
        $accessory_config = $this->config['accessory'][$accessory];

        if (!isset($accessory_config['host'])) {
            throw new \Exception('no host: accessory='.$accessory);
        }
        $host = $this->getHost($accessory_config['host']);

        if (!isset($accessory_config['command'][$command])) {
            throw new \Exception('command not found: accessory='.$accessory.', command='.$command);
        }

        $command_object = new Command($host, $accessory_config['command'][$command]);

        return $command_object;
    }
}