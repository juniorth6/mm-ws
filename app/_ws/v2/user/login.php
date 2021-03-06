<?php

/**
 * This is the request for the login system.
 * Authentication is database based.
 * 
 * *** ONLY EDIT IF YOU KNOW WHAT YOU'RE DOING ***
 */

use MMWS\Controller\UserController;


/**
 * @var string $procedure is the procedure to be called
 */
global $procedure;

/**
 * @var mixed $params are the URL request params
 */
global $params;

/**
 * @var Array $data is the content extracted from the POST|PATCH request
 */
global $data;

if (array_key_exists('_', $data)) {
    $procedure = $data['_'];
    unset($data['_']);
} else {
    send(http_message(400));
    die();
}

$procedures = array(
    /**
     * Makes a request to the Database for logging in
     * @param $d the data from the POST
     */
    'auth_request' => function ($d) {
        $u = new UserController($d);
        if ($res = $u->login()) {
            return ['res' => true, 'msg' => 'Logged in successfully.'];
        } else {
            return ['msg' => 'Incorrect user or password', 'res' => false];
        }
    },
);



if (array_key_exists($procedure, $procedures)) {
    $m = $procedures[$procedure]($data);
    send(is_array($m) ? $m : ['res' => $m]);
} else {
    send(http_message(403));
    die();
}
