<?php
/**
 * Created by PhpStorm.
 * User: matsui
 * Date: 2017/09/09
 * Time: 12:00
 */

namespace Crhg\IRKit;

use GuzzleHttp\Exception\RequestException;

class Client
{
    /** @var Config */
    protected $config;

    /**
     * Client constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = new Config($config);
    }

    /**
     * send command to accessory
     *
     * @param $accessory_name
     * @param $command_name
     * @throws \Exception
     */
    public function send($accessory_name, $command_name)
    {
        $command = new Command($accessory_name, $command_name, $this->config);
        $host = $command->getHost();
        $http_client = $host->getHttpClient();
        $uri = $host->getUri().'/messages';
        $retry = $host->getRetry();

        while ($retry > 0) {
            try {
                $response = $http_client->post(
                    $uri,
                    ['json' => $command->getData()]
                );
                if ($response->getStatusCode() == 200) {
                    return;
                }
            } catch (RequestException $e) {
                // retry
            }
            $retry--;
        }
        throw new \Exception('retry count exceeded');
    }
}
