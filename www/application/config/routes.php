<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * @package  Core
 *
 * Sets the default route to "page"
 */
$config['_default'] = 'home';
$config['template'] = 'home/404';
$config['template/(.)*'] = 'home/404/$0';
