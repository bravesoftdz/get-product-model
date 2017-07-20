<?php

namespace Dykyi;

use Dykyi\Driver\CacheDriver;
use Dykyi\Common\NullCache;
use Dykyi\Common\FileCache;

/**
 * Class CacheFactoryAbstract
 * @package Dykyi
 */
abstract class CacheFactoryAbstract
{
    public function create($type)
    {
        switch ($type) {
            case'file':
                return new CacheDriver(new FileCache());
            case 'none':
                return new CacheDriver(new NullCache());
            default:
                return new CacheDriver(new NullCache());
        }
    }
}

class Cache extends CacheFactoryAbstract
{

}