<?php
/**
 * Created by PhpStorm.
 * User: matsui
 * Date: 2017/09/09
 * Time: 13:49
 */

namespace Crhg\IRKit;


class Host
{
    const DEFAULT_RETRY = 1;

    protected $uri;
    protected $http_option;
    protected $retry; // retry count

    public function __construct($name, Config $config)
    {
        $host_config = $config->getOrFail("host.$name");
        ['host'][$name];

        if (!isset($host_config['uri'])) {
            throw new \Exception('no uri: host='.$name);
        }

        $this->uri = $config->getOrFail("host.$name.uri");
        $this->http_option = $config->get("host.$name.http_option", []);
        $this->retry = $config->get("host.$name.retry", self::DEFAULT_RETRY);
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function getHttpOption()
    {
        return $this->http_option;
    }

    public function getRetry()
    {
        return $this->retry;
    }

    public function getHttpClient()
    {
        $http_client = new \GuzzleHttp\Client($this->getHttpOption());
        return $http_client;
    }
}
