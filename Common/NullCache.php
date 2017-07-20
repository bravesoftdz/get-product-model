<?php

namespace Dykyi\Common;

use Dykyi\Handler\ICache;

/**
 * Class Cache
 * @package Dykyi\Driver
 */
class NullCache implements ICache
{
    /**
     * @param $id
     * @return array
     */
    public function getProductByID($id)
    {
        return [];
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function setProductByID($id, $data)
    {
        return true;
    }
}