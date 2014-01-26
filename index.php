<?php
/**
* приложение
*
* в этом файле описывается структура приложения, подключаются необходимые библиотеки и плагины
*
* @copyright  Copyright (c) 2014 rishatsharafiev
* @license    The MIT License (MIT) 
* @author     rishatsharafiev <sharafiev.webmoney@gmail.com>
* @link       https://github.com/rishatsharafiev/progress
* @since      0.1.0
*/

// phpdoc template:list
// rm -rf ./docs && phpdoc -d . -t ./docs --template="responsive"
// rm -rf ./docs && phpdoc -d . -t ./docs --template="clean"
// rm -rf ./docs && phpdoc -d . -t ./docs --template="responsive-twig"

require("lib/progress.php");
require("lib/middleware/session.php");
require("lib/middleware/cookie.php");
require("lib/middleware/mysql.php");


// application
$app = new Progress();

// configuration
define('MODE', 'development');

$app->configure('production', function(){
  require("lib/middleware/cache.php");
});

$app->configure('development', function(){
  require("lib/middleware/log.php");
});

// routing
$app->get('\/', function(){
  Progress::run('crack', 'index');

});

$app->get('\/site', function(){
  Progress::run('site', 'index');
});

$app->get('\/site\?name=\d+', function(){
  Progress::run('site', 'index');
});

$app->post('\/request', function(){
  foreach ((new Request()) as $key => $value) {
    echo $key." => ".$value."<br>";
  }
});

$app->error(function(){
  Progress::run('error', 'index');
});

?>
