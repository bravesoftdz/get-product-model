<?php

namespace Dykyi;

use Dykyi\Driver\MySQLDriver;
use Dykyi\Driver\ElasticSearchDriver;

/**
 * Class StorageFactoryAbstract
 * @package Dykyi
 */
abstract class StorageFactoryAbstract
{
    public function create($type)
    {
        switch ($type) {
            case'mysql':
                return new MySQLDriver();
            case'elasticsearch':
                return new ElasticSearchDriver();
            default:
                return new ElasticSearchDriver();
        }
    }
}

class Storage extends StorageFactoryAbstract
{

}