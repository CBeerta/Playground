<?php
/**
* Homebrew Website of Claus Beerta
*
* PHP Version 5.3
*
* Copyright (C) 2011 by Claus Beerta
*
* Permission is hereby granted, free of charge, to any person obtaining a copy
* of this software and associated documentation files (the "Software"), to deal
* in the Software without restriction, including without limitation the rights
* to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the Software is
* furnished to do so, subject to the following conditions:
*
* The above copyright notice and this permission notice shall be included in
* all copies or substantial portions of the Software.
*
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
* THE SOFTWARE.
*
* @category Personal_Website
* @package  MyWebPage
* @author   Claus Beerta <claus@beerta.de>
* @license  http://www.opensource.org/licenses/mit-license.php MIT License
* @link     http://claus.beerta.de/
**/

require 'vendor/autoload.php';

/**
* Autoloader for helpers and controllers
*
* @param string $class A Class file that is needed
*
* @return void
**/
function autoloader($class)
{
    $directories = array('/controllers/', '/lib/', '/controllers/importers/');
    
    foreach ($directories as $dir) {
        if (file_exists(__DIR__ . $dir . strtolower($class) . '.php')) {
            include_once __DIR__ . $dir . strtolower($class) . '.php';
            return;
        } else if (file_exists(__DIR__ . $dir . $class . '.php')) {
            include_once __DIR__ . $dir . $class . '.php';
            return;
        }
    }
}

spl_autoload_register("autoloader");

Helpers::option('templates.path', __DIR__ . '/views/');

/**
* Load config file and override default options
**/    
if (file_exists(__DIR__."/config.ini")) {
    $config = parse_ini_file(__DIR__."/config.ini");
    foreach ( $config as $k => $v ) {
        Helpers::option($k, $v);
    }
}

ORM::configure('sqlite:' . Helpers::option('dbfile'));
ORM::configure('id_column', 'ID');
ORM::configure('logging', false);

ORM::configure(
    'id_column_overrides', array(
        'term_relations' => 'post_terms_ID',
        'post_meta' => 'post_meta_id',
        'posts' => 'ID',
    )
);

if (PHP_SAPI == 'cli') {
    return;
}

$app = new \Slim\Slim(
    array(
        'view' => 'TwigView',
        'templates.path' => Helpers::option('templates.path'),
        'mode' => 'production',
    )
);

$app->configureMode(
    'production', function () use ($app) {
        $app->config(
            array(
            'log.enable' => false,
            'debug' => false
            )
        );
    }
);

$app->notFound('Other::notFound');


$app->view()->appendData(
    array(
    'header_image'=> Helpers::randomHeaderImage(__DIR__ . '/public/header-images/'),
    'date_format' => Helpers::option('date_format'),
    'editor' => Helpers::isEditor(),
    'tag_cloud' => Other::tagCloud(),
    'active' => 'projects',
    'title' => null,
    '_host' => $_SERVER['HTTP_HOST'],
    )
);


