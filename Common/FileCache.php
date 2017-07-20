<?php

namespace Dykyi\Common;

use Dykyi\Handler\ICache;

/**
 * Class Cache
 * @package Dykyi\Driver
 */
class FileCache implements ICache
{
    /**
     * @param $id
     * @return array
     */
    public function getProductByID($id)
    {
        return ['date' => date('Y-m-d H:i:s')];
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