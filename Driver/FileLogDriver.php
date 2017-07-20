<?php

namespace Dykyi\Driver;

use Dykyi\Handler\ILogDriver;

/**
 * Class FileLogDriver
 * @package Dykyi\Driver
 */
class FileLogDriver implements ILogDriver
{

    const FILE_PATH = 'log.log';

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function write($id, $data)
    {
        $file = $this->readAll();
        $file[$id] = $data;
        return file_put_contents(self::FILE_PATH, serialize($file));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function readFromId($id)
    {
        $data = file_get_contents(self::FILE_PATH);
        $data = unserialize($data);
        return $data[$id];
    }

    /**
     * @return mixed
     */
    public function readAll()
    {
        $data = file_get_contents(self::FILE_PATH);
        return unserialize($data);
    }
}