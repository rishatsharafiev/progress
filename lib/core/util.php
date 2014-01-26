<?php

/**
* вспомогательные функции
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

class Util
{
  /**
  * генерирует хэш определенной длины
  * 
  * @param  int     $length   задается длина хэша
  * @param  int     $add      добавочные символы в хэш 
  * @return string  возращает сгенерированный хэш
  */
  public static function hash($length, $add)
  {
    $chars="qazxswedcvfrtgbnhyujmkiolp"; // 26
    if(isset($add) && $add === 1) $chars.="1234567890"; // 10
    if(isset($add) && $add === 2) $chars.="QAZXSWEDCVFRTGBNHYUJMKIOLP"; // 26
    $hash = null;
    $length = $length;
    $size= StrLen($chars) - 1; 
    while($length--) $hash .= $chars[rand(0,$size)]; 
    return $hash;    
  }
}

?>