<?php

/**
 * This is a Local system variables configuration file. 
 * Rename this file to variables-local.php if you want
 * to use some local custom variables
 * and do not remove this file from .gitignore
 */

/**
 * Global session save path
 */
ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));

/** Enable CORS to *EXACTLY* this URL */
define('HTTP_CORS_URI', '*');

/** Enable defined headers */
define('HTTP_ALLOW_HEADERS', 'content-type, user-addr, authorization');

/** Allow defined http methods to request */
define('HTTP_ALLOW_METHODS', 'GET, POST, PATCH, PUT, DELETE, HEAD, OPTIONS');

/** Sets the content type for the requests */
define('HTTP_CONTENT_TYPE', 'application/json');

/** Files */
define('DEFAULT_INVOICE_PATH', 'app/_files/invoices');
define('DEFAULT_FILE_PATH', 'app/_files/');

/** MailGun */
define('DEFAULT_NOREPLY_EMAIL', 'noreply@moneyright.com.br');
define('DEFAULT_MAILGUN_KEY', '123456');
define('DEFAULT_MAILGUN_URL', '123456');

// /** Consumer */
// define('ORIGIN_HTTP_ADDR', getallheaders()['User-Addr'] ?? null);
// define('USER_AUTHORIZATION_TOKEN', getallheaders()['Authorization'] ?? null);
