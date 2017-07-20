<?php

namespace Dykyi;

use Exception;

/**
 * Class Config
 * @package Dykyi
 */
class Config
{
    public function __construct()
    {
        require_once CONFIG_FOLDER . '/config.php';
        $this->main = $main;
    }

    /**
     * @param $name
     */
    private function getFileSettings($name)
    {
        $path = CONFIG_FOLDER . '/' . $name . '.php';
        if (file_exists($path)) {
            require_once $path;
            $this->$name = $$name;
        }
    }

    /**
     * @param $files
     * @return bool
     * @throws Exception
     */
    public function get($files)
    {
        if (is_array($files)) {
            foreach ($files as $file) {
                $this->getFileSettings($file);
            }
            return true;
        }

        if (is_string($files)) {
            $this->getFileSettings($files);
            return true;
        }
        throw new Exception('Function expects string or array');
    }
}