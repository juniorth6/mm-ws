<?php

namespace MMWS\Handler;


/**
 * Handles the HTTP requests
 * 
 * This handler is not done yet. DO NOT USE IT
 * @ignore
 * @deprecated MMWS^0.9.1
 * @package MMWS
 * @author Andre Mury <mury_gh@hotmail.com>
 * @version MMWS^0.9.1-alpha
 */
class Request
{
    /**
     * @var Array<Array> $request contains the endpoint [request_method] => ['page', 'procedure'] for each endpoint set to the same file.
     */
    private $request = [];

    function __construct()
    {
    }

    /**
     * Adds a request method to an endpoint
     * @param String $method GET|POST|DELETE|PATCH|PUT
     * @param String $page the actual file to the endpoint
     * @param String $procedure the method to be called in $file
     */
    public function add(String $method, String $page, String $procedure)
    {
        $this->request[strtoupper($method)] = [
            'page' => $this->setFilePath($page),
            'procedure' => $procedure
        ];
        return $this;
    }

    /**
     * Gets the endpoint configuration method, request and file
     * @return bool|Array the configurations or false if not exists.
     */
    public function get(String $method)
    {
        if (array_key_exists(strtoupper($method), $this->request)) {
            return $this->request[strtoupper($method)];
        }
        return false;
    }

    /**
     * This method mounts the actual file path to be loaded as an endpoint. Must be set or anything will
     * happen.
     * @param String $page is the domain/file combination where "domain" is the folder and "file" is the actual file name.
     * @param Int $v version control. Default is 2.
     * @return String with full path.
     */
    private function setFilePath(String $page, Int $v = 2)
    {
        return 'app/_ws/v' . $v . '/' . $page . '.php';
    }
}
