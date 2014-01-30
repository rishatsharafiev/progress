<?php

/**
* суперкласс для всех классов-ошибок
*
* позволяет заранее задать необходимый набор свойств и методов
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
*/

class Error extends Exception
{
  /**
  * конструктор
  *     
  * @return void
  */
  public function Error($message = '', $code = 0)
  {
    $this->message = $message;
    $this->code = $code;
  }

  /**
  * конструктор
  *     
  * @return void
  */
  public static function production() {
    
  }

  public static function development($exception) {
    echo "----------------------------------------------------------------------------------------<br>
          <b>message: </b>".$exception->getMessage()."<br>
          <b>code: </b>".$exception->getCode()."<br>
          <b>file: </b>".$exception->getFile()."<br>
          <b>line: </b>".$exception->getLine()."<br>";

    echo "----------------------------------------------------------------------------------------<br>
          <b>traceback</b>";

    $trace = explode('#', $exception->getTraceAsString());
    foreach($trace as $value){
      echo $value."<br>";
    }

    echo "----------------------------------------------------------------------------------------<br>";
  }
}

$dev_mode = (isset($dev_mode)) ? $dev_mode : 'production';
set_exception_handler($dev_mode === 'development' ? 'Error::development' : 'Error::production');

?>