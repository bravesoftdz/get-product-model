<?php

namespace Dykyi\Handler;

/**
 * Interface IMySQLDriver
 * @package Dykyi\Handler
 */
interface IMySQLDriver
{
    /**
     * @param string $id
     * @return array
     */
    public function findById($id);
}
