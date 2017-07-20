<?php

namespace Dykyi\Driver;

use Dykyi\Handler\ICache;

/**
 * Class CacheDriver
 * @package Dykyi\Driver
 */
class CacheDriver
{
    private $handle = null;

    public function __construct(ICache $storage)
    {
        $this->handle = $storage;
    }

    /**
     * @param $id
     * @return array
     */
    public function getProductByID($id)
    {
        return $this->handle->getProductByID($id);
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function setProductByID($id, $data)
    {
        return $this->handle->setProductByID($id, $data);
    }
}