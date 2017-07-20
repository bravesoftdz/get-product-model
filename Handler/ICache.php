<?php

namespace Dykyi\Handler;

/**
 * Class ICache
 * @package Dykyi\Handler
 */
interface ICache
{
    /**
     * @param $id
     * @return array
     */
    public function getProductByID($id);

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function setProductByID($id, $data);
}