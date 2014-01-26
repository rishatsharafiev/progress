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
  public function Error()
  {
    
  }
}

/**
* ошибки возникающие из-за несоотвествия типов
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
class TypeError extends Error
{
  /**
  * конструктор
  *     
  * @return void
  */
  public function TypeError()
  {
    
  }
}

/*
function Production() {
  echo "prod";
}

function Development() {
  echo "dev";
}

set_exception_handler(MODE == 'development' ? 'Development' : 'Production');
*/

?>