<?php

namespace Dykyi;

use Dykyi\Driver\FileLogDriver;

/**
 * Class LoggerFactoryAbstract
 * @package Dykyi
 */
abstract class LoggerFactoryAbstract
{
    public function create($type)
    {
        switch ($type) {
            case'file':
                return new FileLogDriver();
            default:
                return new FileLogDriver();
        }
    }
}

class Logger extends LoggerFactoryAbstract
{

}