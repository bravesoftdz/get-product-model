<?php

namespace Dykyi\Handler;

/**
 * Interface IElasticSearchDriver
 * @package Dykyi\Handler
 */
interface IElasticSearchDriver
{
    /**
     * @param string $id
     * @return array
     */
    public function findById($id);
}

