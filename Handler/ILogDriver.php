<?php

namespace Dykyi\Handler;

/**
 * Interface ILogDriver
 * @package Dykyi\Handler
 */
interface ILogDriver
{
    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function write($id, $data);

    /**
     * @param $id
     * @return array
     */
    public function readFromId($id);

    /**
     * @return mixed
     */
    public function readAll();
}
