<?php

namespace Dykyi;

use Dykyi\Common\NullCache;

define('SYS_ENV', getenv('SYS_ENV') ?: 'test');
define('CONFIG_FOLDER', 'config');

require_once '../vendor/autoload.php';

/**
 * Class ProductController
 * @package Dykyi
 */
class ProductController
{
    private $storage;
    private $cache;
    private $logger;

    /**
     * @param $id
     */
    private function incNumberOfRequests($id)
    {
        $log = $this->logger->readFromId($id);
        if (!$log) {
            $log['numberOfRequests'] = 0;
        }

        $log['numberOfRequests']++;
        $this->logger->write($id, $log);
    }

    public function __construct()
    {
        // get config
        $config = new Config();
        $config->get(['db', 'cache']);

        // set storage
        if (SYS_ENV == 'test') {
            $this->storage = (new Storage())->create('mysql');
        } else {
            $this->storage = (new Storage())->create($config->main['db']);
        }

        //set cache
        $this->cache = (new Cache())->create($config->main['cache']);

        //set logger
        $this->logger = (new Logger())->create($config->main['log']);
    }

    /**
     * @param $id
     * @return array
     */
    public function getProductById($id)
    {
        if ($this->cache instanceof NullCache) {
            $product = $this->storage->findById($id);
        } else {
            $product = $this->cache->getProductByID($id);
            if (!$product) {
                $product = $this->storage->findById($id);
                $this->cache->setProductByID($id, $product);
            }
        }
        return $product;
    }

    /**
     * @param $id
     * @return string
     */
    public function detail($id)
    {
        $product = $this->getProductById($id);
        $this->incNumberOfRequests($id);
        return json_encode($product);
    }

}

(new ProductController())->detail(10);