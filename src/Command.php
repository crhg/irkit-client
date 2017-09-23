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
     *
     * @param string $accessory_name
     * @param string $command_name
     * @param Config $config
     */
    public function __construct($accessory_name, $command_name, Config $config)
    {
        $host_name = $config->getOrFail("accessory.$accessory_name.host");
        $this->host = new Host($host_name, $config);

        $data = $config->getOrFail("accessory.$accessory_name.command.$command_name");
        $this->data = $data;
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