<?php
/**
 * Created by PhpStorm.
 * User: matsui
 * Date: 2017/09/09
 * Time: 12:00
 */

namespace Crhg\IRKit;

class Client
{
    /** @var Config */
    protected $config;

    public function __construct(array $config)
    {
        $this->config = new Config($config);
    }

    public function send($accessory_name, $command_name)
    {
        $command = $this->config->getCommand($accessory_name, $command_name);
        $host = $command->getHost();
        $http_client = $host->getHttpClient();
        $http_client->post(
            $host->getUri().'/messages',
            ['json' => $command->getData()]
        );
    }
}