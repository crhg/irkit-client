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
    protected $uri;
    protected $http_option;
    protected $retry;

    public function __construct($name, Config $config)
    {
        $c = $config->getConfig();

        if (!isset($c['host'][$name])) {
            throw new \Exception('config not found: host='.$name);
        }

        $host_config = $c['host'][$name];

        if (!isset($host_config['uri'])) {
            throw new \Exception('no uri: host='.$name);
        }

        $this->uri = $host_config['uri'];
        $this->http_option = $host_config['http_option'] ?? [];
        $this->retry = $host_config['retry'] ?? 1;
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
