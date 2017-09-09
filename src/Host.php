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

    public function __construct($uri, $http_option)
    {
        $this->uri = $uri;
        $this->http_option = $http_option;
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function getHttpOption()
    {
        return $this->http_option;
    }

    public function getHttpClient()
    {
        $http_client = new \GuzzleHttp\Client($this->getHttpOption());
        return $http_client;
    }


}
