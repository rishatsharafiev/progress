<?php

require("core/error.php");
require("core/request.php");
require("core/url.php");
require("core/util.php");


/**
* ядро фреймворка
*
* класс соединяет все модули ядра и выдает базовые методы для работы с фреймворком
*
* @package    lib
* @copyright  Copyright (c) 2014 rishatsharafiev
* @license    The MIT License (MIT) 
* @author     rishatsharafiev <sharafiev.webmoney@gmail.com>
* @link       https://github.com/rishatsharafiev/progress
* @since      0.1.0
*
* @version    0.1.0
*/

class Progress
{
  /**
  * запускает контроллер
  * 
  * подключает файл и создает экземпляр контроллера, выполняет действие
  *
  * @param  string    $controller  имя контроллера, соответсвует имени файла, в котором его класс
  * @param  callable  $action      имя действия, соответсвует имени метода в контроллере
  * @throws Exception    
  * @throws Exception    
  * @return void
  */
  public static function run($controller, $action)
  {
    $file = 'app/controllers/'.$controller.'.php';
    if (file_exists($file)) {
      if (require_once($file)) {
        (new $controller())->$action();
      } else {
        throw new Exception();
      }
    } else {
      throw new Exception();
    }
  }

  /**
  * задает ответ на get-запрос по определенному url
  * 
  * @param  string    $rule      регулярное выражение, шаблон определенного url
  * @param  callable  $callback  анонимная функция, содержит в себе инструкции
  * @throws Exception            объект ошибки
  * @return void
  */
  public function get($rule, $callback)
  {
    if (Url::match($rule, $_SERVER['REQUEST_URI'])) {
      if (is_callable($callback)) {
        $callback();
      } else {
        throw new Exception("isn't callable");
      }
    }
  }

  /**
  * задает ответ на post-запрос по определенному url
  * 
  * @param  string    $rule      регулярное выражение, шаблон определенного url
  * @param  callable  $callback  анонимная функция, содержит в себе инструкции
  * @throws object    объект ошибки
  * @return void
  * @todo   сделать идентификацию нужного post запроса, по содержимому $_POST
  */
  public function post($rule, $callback)
  {
    if (Url::match($rule, $_SERVER['REQUEST_URI'])) {
      if (is_callable($callback)) {
        $callback();
      } else {
        throw new Exception("isn't callable");
      }
    }
  }

  /**
  * конфигурация выполнения приложения
  * 
  * позволяет в зависимости от установленного мода задавать и
  * подключать различные скрипты или выполнять иные действия
  * 
  * @param  string    $mode      название мода(production или development)
  * @param  callable  $callback  анонимная функция, содержит в себе инструкции
  * @return void 
  */
  public function configure($mode, $callback)
  {
    if (MODE === $mode) {
      $callback();
    }
  }

  /**
  * конфигурация выполнения приложения
  * 
  * позволяет в зависимости от установленного мода задавать и
  * подключать различные скрипты или выполнять иные действия
  * 
  * @param  string    $mode      название мода(production или development)
  * @param  callable  $callback  анонимная функция, содержит в себе инструкции
  * @return void 
  */
  public function error($callback)
  {
    
  }
}


?>
