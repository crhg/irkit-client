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
     * @param Host $host
     * @param array $data
     */
    public function __construct(Host $host, array $data)
    {
        $this->host = $host;
        $this->data = $data;
    }

    /**
     * @return Host
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
}