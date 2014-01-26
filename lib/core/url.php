<?php

/**
* базовая обработка ошибок
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
class Url 
{
  /**
  * проверяет на соотвествие регулярного выражения строке url
  * 
  * @param  string    $reg       шаблон регулярного выражения
  * @param  string    $str       строка url
  * @return bool      возращает  результат проверки соответствию шаблону
  */
  public static function match($reg, $str){

    $reg = '/^'.$reg.'$/';

    if (preg_match($reg, $str) ) {
      return true;
    } else {
      return false;
    }
  }

  /**
  * парсит url в массив
  * 
  * возращает ассоциативный массив
  * <code>
  *   array( "search"=>"?name=roma&surname=petrov",
  *          "query"=>array("name"=>"roma",
  *                         "surname"=>"petrov"),
  *          "hash"=>"#tag" 
  *         )
  * </code>
  *
  * @param   string  $url   принимает url 
  * @return  array          возращает ассоциативный массив
  * @todo    реализовать
  */
  public static function parse($url){
    
  }
}

?>