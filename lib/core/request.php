<?php

/**
* объект-обертка http-запроса
*
* @package    lib
* @subpackage core
* @copyright  Copyright (c) 2014 rishatsharafiev
* @license    The MIT License (MIT) 
* @author     rishatsharafiev <sharafiev.webmoney@gmail.com>
* @link       https://github.com/rishatsharafiev/progress
* @since      0.1.0
*
* @version    0.1.0
* @todo       оптимизация путем реализации singleton
*/

class Request 
{
  /**
  * обработка http-заголовков и тела сообщения
  * 
  * @return void 
  */
  private function headers()
  {
    // $_SERVER
    $this->uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
    $this->host = filter_input(INPUT_SERVER, 'HTTP_HOST');
    $this->ua = filter_input(INPUT_SERVER, 'HTTP_USER_AGENT');
    $this->ip =  filter_input(INPUT_SERVER, 'REMOTE_ADDR');
    $this->connection = filter_input(INPUT_SERVER, 'HTTP_CONNECTION');
    $this->method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

    // $_GET
    foreach ($_GET as $key => $value) {
      $this->get[$key] = filter_input(INPUT_GET, $key);
    }

    // $_POST
    foreach ($_POST as $key => $value) {
      $this->post[$key] = filter_input(INPUT_POST, $key);
    }

    // $_COOKIE
    foreach ($_COOKIE as $key => $value) {
      $this->cookie[$key] = filter_input(INPUT_COOKIE, $key);
    }
  }

  /**
  * конструктор
  * 
  * @return void 
  */
  public function Request()
  {
    $this->headers();
  }
}

?>