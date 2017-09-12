<?php
/**
 * Created by PhpStorm.
 * User: matsui
 * Date: 2017/09/09
 * Time: 13:45
 */

namespace Crhg\IRKit;


class Command
{
    /**
     * @var Host
     */
    protected $host;
    /**
     * @var array
     */
    protected $data;

    /**
     * Command constructor.
     * @param $accessory_name
     * @param $command_name
     * @param $config
     * @throws \Exception
     */
    public function __construct($accessory_name, $command_name, Config $config)
    {
        $c = $config->getConfig();

        if (!isset($c['accessory'][$accessory_name]['host'])) {
            throw new \Exception("accessory not found: $accessory_name");
        }
        $host_name = $c['accessory'][$accessory_name]['host'];
        $this->host = new Host($host_name, $config);

        if (!isset($c['accessory'][$accessory_name]['command'][$command_name])) {
            throw new \Exception("command not found: $accessory_name, $command_name");
        }
        $this->data = $c['accessory'][$accessory_name]['command'][$command_name];
    }

    /**
     * return data to send
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * return IRKit host to which accessory belongs
     *
     * @return Host
     */
    public function getHost()
    {
        return $this->host;
    }
}